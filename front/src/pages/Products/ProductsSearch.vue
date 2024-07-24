<template>
  <q-page>
    <div class="text-subtitle2 text-bold text-center q-pa-md bg-primary text-white" style="border-radius:  0px 0px 20px 20px;">
      <div style="position: absolute; left: 10px;">
        <q-btn flat round dense color="white" icon="arrow_back" @click="this.$router.go(-1)"/>
      </div>
      Buscar productos
    </div>
    <div class="row q-mt-xs q-mx-xs">
      <div class="col-12 col-md-6 offset-md-3">
        <q-input outlined v-model="search" label="Buscar" rounded dense>
          <template v-slot:prepend>
            <q-icon name="search" />
          </template>
        </q-input>
      </div>
      <div class="col-12 col-md-3 q-pa-xs"></div>
      <div class="col-6 col-md-3 q-pa-xs">
        <q-select outlined v-model="category" :options="categories" label="Categoría" dense
                  emit-value map-options :option-label="opt => opt.nombre" :option-value="opt => opt"
        >
        </q-select>
      </div>
      <div class="col-6 col-md-3 q-pa-xs">
        <q-select outlined v-model="subCategory" :options="subCategories" label="Subcategoría" dense
                  emit-value map-options :option-label="opt => opt.nombre" :option-value="opt => opt"
        >
        </q-select>
      </div>
      <div class="col-6 col-md-3 q-pa-xs">
        <q-select outlined v-model="item" :options="items" label="Item" dense>
        </q-select>
      </div>
      <div class="col-6 col-md-3 q-pa-xs q-pr-md">
        <q-slider v-model="precio" :min="0" :max="50000"/>
        <div class="text-caption text-center">
          $ {{precio}}
        </div>
      </div>
      <div v-for="(product, index) in filteredProducts" :key="index" class="col-12 col-md-3" >
        <q-card  class="q-ma-sm cursor-pointer"  flat bordered
                 @click="$router.push(`/producto/${product.id}/${espacioGuiones(product.titulo)}`)"
        >
          <q-card-section horizontal>
            <q-img
              class="col-4"
              :src="`${$url}../images/${product.imagen1}`"
              height="120px"
            />
            <q-card-actions vertical class="justify-around q-px-md">
              <div class="text-grey-7 text-bold"
                   :style="`overflow: hidden; text-overflow: ellipsis; white-space: nowrap;width: ${$q.screen.lt.sm ? '230px' : '165px'};`">
                {{ product.titulo }}
              </div>
              <div class="text-grey-7">
                {{ product.category.name }} - {{ product.sub_category.name }}
              </div>
              <div class="row items-center">
                <div class="text-blue-7 text-bold">
                  $ {{ product.precio }}
                </div>
                <q-space/>
                <div class="text-grey-7 text-bold line-through" v-if="product.precioAnterior">
                  $ {{ product.precioAnterior }}
                </div>
                <q-space/>
                <q-btn size="8px" color="primary" unelevated icon="fa-solid fa-angles-right" aria-label="Like" />
              </div>
            </q-card-actions>
          </q-card-section>
        </q-card>
      </div>
    </div>
<!--    <pre>{{products.length}}</pre>-->
<!--    <pre>{{categories}}</pre>-->
<!--    <pre>{{subCategories}}</pre>-->
<!--    <pre>{{filteredProducts.length}}</pre>-->
  </q-page>
</template>
<script>
export default {
  name: 'ProductsSearch',
  data () {
    return {
      search: '',
      products: [],
      precio: 50000,
      productsAll: [],
      categories: [
        {
          id: 0,
          nombre: 'Todas',
        }
      ],
      subCategories: [
        {
          id: 0,
          nombre: 'Todas',
        }
      ],
      category: {
        id: 0,
        nombre: 'Todas',
      },
      subCategory: {
        id: 0,
        nombre: 'Todas',
      },
      items: [
        'Todas',
      ],
      item: 'Todas',
    }
  },
  mounted() {
    this.productsGet()
  },
  methods: {
    espacioGuiones(texto) {
      return texto.replace(/ /g, "-");
    },
    productsGet() {
      this.$axios.get("products").then((response) => {
        response.data.forEach((product) => {
          if (!this.categories.find((category) => category.id === product.category_id)) {
            this.categories.push({
              id: product.category_id,
              nombre: product.category.name
            });
          }
          if (!this.subCategories.find((subCategory) => subCategory.id === product.sub_category_id)) {
            this.subCategories.push({
              id: product.sub_category_id,
              nombre: product.sub_category.name
            });
          }
          for (let i = 1; i <= 10; i++) {
            let item = product[`item${i}`];
            if (item !== null && item !== '' && !this.items.includes(item)) {
              this.items.push(item);
            }
          }
        });
        this.products = response.data;
        this.productsAll = response.data;
      })
    },
  },
  computed: {
    filteredProducts() {
      return this.products.filter((product) => {
        return product?.titulo && ( product.titulo.includes(this.search) || product.descripcion.includes(this.search) )
        && (this.category.id === 0 || product.category_id === this.category.id)
        && (this.subCategory.id === 0 || product.sub_category_id === this.subCategory.id)
        && (this.item === 'Todas' || product.item1 === this.item || product.item2 === this.item || product.item3 === this.item || product.item4 === this.item || product.item5 === this.item || product.item6 === this.item || product.item7 === this.item || product.item8 === this.item || product.item9 === this.item || product.item10 === this.item)
        && parseInt(product.precio) <= this.precio;
      });
    }
  }
}
</script>
