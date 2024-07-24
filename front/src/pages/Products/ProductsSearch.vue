<template>
  <q-page>
    <div class="text-subtitle2 text-bold text-center q-pa-md bg-primary text-white" style="border-radius:  0px 0px 20px 20px;">
      Buscar productos
    </div>
    <div class="row q-mt-md q-mx-xs">
      <div class="col-12 col-md-6 offset-md-3">
        <q-input outlined v-model="search" label="Buscar" rounded dense>
          <template v-slot:prepend>
            <q-icon name="search" />
          </template>
        </q-input>
      </div>
    </div>
  </q-page>
</template>
<script>
export default {
  name: 'ProductsSearch',
  data () {
    return {
      search: '',
      products: [],
      categories: [],
      subCategories: [],
    }
  },
  mounted() {
    this.productsGet()
  },
  methods: {
    productsGet() {
      this.$axios.get("products").then((response) => {
        response.data.forEach((product) => {
          if (!this.categories.find((category) => category.id === product.category_id)) {
            this.categories.push({
              id: product.category_id,
              nombre: product.category.name,
              icon: product.category.icon,
            });
          }
          if (!this.subCategories.find((subCategory) => subCategory.id === product.sub_category_id)) {
            this.subCategories.push({
              id: product.sub_category_id,
              nombre: product.sub_category.name,
              icon: product.sub_category.icon,
            });
          }
        });
      })
    },
  },
}
</script>
