<template>
  <q-page>
    <div>
      <a>{{products}}</a>
    </div>
  </q-page>
</template>
<script>
export default {
  name: 'ProductsPage',
  data () {
    return {
      products: [],
      product: {},
      categories: [],
      loading: false,
    }
  },
  mounted() {
    this.getProducts()
  },
  methods: {
    getProducts () {
      this.loading = true
      this.$axios.get('products')
        .then(response => {
          this.products = response.data
        })
        .catch(error => {
          this.$alert.error(error.response.data.message)
        }).finally(() => {
          this.loading = false
        })
    }
  },
}
</script>
