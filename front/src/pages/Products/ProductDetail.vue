<template>
<q-page>
  <div class="row">
    <div class="col-12 col-md-1"></div>
    <div class="col-12 col-md-10">
      <div class="row">
        <div class="col-12 row items-center q-pt-md q-px-md">
          <q-btn
            round
            size="12px"
            unelevated
            color="grey-3"
            text-color="black"
            icon="fa-solid fa-arrow-left"
            aria-label="Back"
            @click="$router.go(-1)"/>
          <q-space/>
          <q-btn-group flat>
            <q-btn
              round
              text-color="black"
              size="12px"
              icon="fa-solid fa-heart"
              aria-label="Like"
              @click="favoritosClick"
            />
            <q-btn
              round
              text-color="black"
              size="12px"
              icon="fa-solid fa-search"
              aria-label="Search"
            />
          </q-btn-group>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-12 col-md-6" >
              <q-carousel
                class="br-20"
                animated
                v-model="slide"
                arrows
                navigation
                autoplay
                infinite
                :height="$q.screen.lt.sm ? '400px' : '500px'"
                control-color="primary"
              >
                <q-carousel-slide :img-src="`${$url}../images/${product.imagen1}`" :name="0" v-if="product.imagen1"/>
                <q-carousel-slide :img-src="`${$url}../images/${product.imagen2}`" :name="1" v-if="product.imagen2"/>
                <q-carousel-slide :img-src="`${$url}../images/${product.imagen3}`" :name="2" v-if="product.imagen3"/>
                <q-carousel-slide :img-src="`${$url}../images/${product.imagen4}`" :name="3" v-if="product.imagen4"/>
              </q-carousel>
            </div>
            <div class="col-12 col-md-6 q-pa-md">
              <div class="text-bold text-h5 q-px-md">{{product.titulo}}</div>
              <q-separator inset/>
              <div class="row items-center">
                <div class="q-pa-md">
                  <q-icon name="fa-solid fa-star" color="grey"/>
                  <span class="text-bold q-pl-xs "> {{product.category?.name}}</span>
                  |
                  <span class="text-bold q-pl-xs "> {{product.sub_category?.name}}</span>
                </div>
                <q-space/>
                <q-badge color="green-2" text-color="green-7" :label="`Stock ${product?.stock}`" class="text-bold text-subtitle2" v-if="product.stock > 0"/>
              </div>
              <div class="text-bold text-h6 q-px-md">
                <span class="text-blue-8 text-bold text-h5">${{product.precio}}</span>
                <span class="text-grey-8 text-bold text-h5 line-through q-ml-md">  ${{product.precioAnterior}}</span>
              </div>
              <div class="q-px-md">
                <q-scroll-area style="height: 180px;">
                  <div class="text-grey-8" v-html="product.descripcion"></div>
                </q-scroll-area>
              </div>
              <div class="q-px-md q-pt-md">
                <q-radio v-model="radio" :val="product.item1" class="q-pl-md" :label="product.item1" color="primary" dense v-if="product.item1"/>
                <q-radio v-model="radio" :val="product.item2" class="q-pl-md" :label="product.item2" color="primary" dense v-if="product.item2"/>
                <q-radio v-model="radio" :val="product.item3" class="q-pl-md" :label="product.item3" color="primary" dense v-if="product.item3"/>
                <q-radio v-model="radio" :val="product.item4" class="q-pl-md" :label="product.item4" color="primary" dense v-if="product.item4"/>
                <q-radio v-model="radio" :val="product.item5" class="q-pl-md" :label="product.item5" color="primary" dense v-if="product.item5"/>
                <q-radio v-model="radio" :val="product.item6" class="q-pl-md" :label="product.item6" color="primary" dense v-if="product.item6"/>
                <q-radio v-model="radio" :val="product.item7" class="q-pl-md" :label="product.item7" color="primary" dense v-if="product.item7"/>
                <q-radio v-model="radio" :val="product.item8" class="q-pl-md" :label="product.item8" color="primary" dense v-if="product.item8"/>
                <q-radio v-model="radio" :val="product.item9" class="q-pl-md" :label="product.item9" color="primary" dense v-if="product.item9"/>
                <q-radio v-model="radio" :val="product.item10" class="q-pl-md" :label="product.item10" color="primary" dense v-if="product.item10"/>
              </div>
              <div class="q-px-md q-pt-md">
                <q-btn square dense color="primary" icon="fa-solid fa-minus" @click="minus" size="10px"/>
                <span class=" text-h6 q-px-md ">{{cantidad}}</span>
                <q-btn square dense color="primary" icon="fa-solid fa-plus" @click="more" size="10px"/>
              </div>
              <div>
                <q-btn
                  rounded
                  color="primary"
                  text-color="white"
                  label="Agregar"
                  class="q-my-md"
                  icon="fa-solid fa-cart-plus"
                  no-caps
                />
<!--                button whatas con mesaje quiero ests producto cantidad y precio-->
                <q-btn
                  rounded
                  type="a"
                  target="_blank"
                  :href="`https://wa.me/5916960327?text=Quiero%20${product.titulo}%20${cantidad}%20${cantidad==1?'unidad':'unidades'}%20por%20${product.precio}`"
                  color="green-8"
                  text-color="white"
                  label="Whatsapp"
                  class="q-my-md q-ml-md"
                  icon="fa-brands fa-whatsapp"
                  no-caps></q-btn>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-1"></div>
  </div>
<!--  <pre>{{product}}</pre>-->
</q-page>
</template>
<script>
export default {
  name: 'ProductDetail',
  data() {
    return {
      product_id: this.$route.params.id,
      product: {},
      slide: 0,
      radio: '',
      cantidad: 1,
    }
  },
  mounted() {
    this.productGet();
  },
  methods: {
    more() {
      if (this.cantidad < this.product.stock) {
        this.cantidad++;
      }
    },
    minus() {
      if (this.cantidad > 1) {
        this.cantidad--;
      }
    },
    favoritosClick() {
      const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
      if (favorites.includes(this.product_id)) {
        console.log('existe');
        favorites.splice(favorites.indexOf(this.product_id), 1);
      } else {
        console.log('no existe');
        favorites.push(this.product_id);
      }
      localStorage.setItem('favorites', JSON.stringify(favorites));
    },
    async productGet() {
      this.$axios.get(`producto/${this.product_id}`).then(res=>{
        this.product = res.data;
        this.radio = this.product.item1;
      })
    }
  }
}
</script>
