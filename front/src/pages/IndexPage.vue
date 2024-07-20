<template>
  <q-page class="q-pa-md">
    <div class="row">
      <div class="col-12 col-md-1"></div>
      <div class="col-12 col-md-10">
        <div class="">
          <q-carousel
            class="br-20"
            animated
            v-model="slide"
            arrows
            navigation
            autoplay
            infinite
            :height="$q.screen.lt.sm ? '150px' : '450px'"
          >
<!--            <q-carousel-slide :name="1" img-src="https://cdn.quasar.dev/img/mountains.jpg" />-->
<!--            <q-carousel-slide :name="2" img-src="https://cdn.quasar.dev/img/parallax1.jpg" />-->
<!--            <q-carousel-slide :name="3" img-src="https://cdn.quasar.dev/img/parallax2.jpg" />-->
<!--            <q-carousel-slide :name="4" img-src="https://cdn.quasar.dev/img/quasar.jpg" />-->
            <q-carousel-slide
              v-for="(carousel, index) in carousels"
              :key="index"
              :name="index"
              :img-src="`${$url}../images/${carousel.imagen}`"
            >
            </q-carousel-slide>
          </q-carousel>
          <div style="overflow-x: auto; white-space: nowrap;">
            <q-btn
              text-color="black"
              rounded
              v-for="(category, index) in categories"
              :key="index"
              :class="`text-subtitle1 ${$q.screen.lt.sm ? 'q-ma-xs' : 'q-ma-md'}`"
              unelevated
              no-caps
              color="grey-3"
              :label="category.nombre"
            />
          </div>
        </div>
      </div>
      <div class="col-12 col-md-1"></div>
      <div class="col-12">
        <div style="overflow-x: auto; white-space: nowrap; display: flex; justify-content: flex-start;">
          <div v-for="(product, index) in products" :key="index" >
            <q-card  class="q-ma-sm" style="width: 220px;" flat >
              <q-img
                :src="`${$url}../images/${product.imagen1}`"
                :alt="product.nombre"
                style="height: 130px"
              >
                <div class="absolute-top-letf q-ma-none bg-primary text-white text-bold" style="padding: 0px 5px;margin: 0;">
                  Mas vendido
                </div>
              </q-img>
              <q-card-section class="q-pa-none">
                <!--                  si se sale que colique 3 puntitps-->
                <div class="text-grey-7 text-bold q-pa-xs text-center"
                     style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                  {{ product.titulo }}
                </div>
                <div class="text-grey-7 q-px-xs "
                     style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                  {{ product.descripcion }}
                </div>
                <div class="row items-center">
                  <div class="text-blue-7 text-bold q-pa-xs text-center">
                    $ {{ product.precio }}
                  </div>
                  <q-space/>
                  <!--                    subrayar-->
                  <div class="text-grey-7 text-bold q-pa-xs text-center line-through" v-if="product.precioAnterior">
                    $ {{ product.precioAnterior }}
                  </div>
                </div>
              </q-card-section>
            </q-card>
          </div>
        </div>
      </div>
    </div>
<!--    <pre>{{masVendidos}}</pre>-->
    <pre>{{categoriesProducts}}</pre>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      slide: 0,
      slide2: 1,
      carousels: [],
      products: [],
      categories: [],
      categoriesProducts: [],
    };
  },
  mounted() {
    this.carouselsGet();
    this.productsGet();
  },
  methods: {
    productsGet() {
      this.categories.push({ id: 0, nombre: "Todos" });
      this.$axios
        .get("products")
        .then((response) => {
          this.products = response.data;
          response.data.forEach((product) => {
            if (!this.categories.find((category) => category.id === product.category_id)) {
              // console.log(product);
              this.categories.push({
                id: product.category_id,
                nombre: product.category.name,
              });
            }
            if(!this.categoriesProducts.find((category) => category.id === product.category_id)){
              this.categoriesProducts.push({
                id: product.category_id,
                nombre: product.category.name,
                products: [product],
              });
            }else{
              const index = this.categoriesProducts.findIndex((category) => category.id === product.category_id);
              this.categoriesProducts[index].products.push(product);
            }
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
    carouselsGet() {
      this.$axios
        .get("carousels")
        .then((response) => {
          this.carousels = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  computed: {
    masVendidos() {
      return this.products.filter((product) => product.masVendido === "si");
    },
  },
};
</script>
