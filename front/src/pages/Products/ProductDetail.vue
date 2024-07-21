<template>
<q-page>
  <pre>{{product}}</pre>
</q-page>
</template>
<script>
export default {
  name: 'ProductDetail',
  data() {
    return {
      product_id: this.$route.params.id,
      product: {}
    }
  },
  mounted() {
    this.productGet();
  },
  methods: {
    async productGet() {
      try {
        const response = await this.$axios.get(`producto/${this.product_id}`);
        this.product = response.data;
      } catch (e) {
        console.log(e);
      }
    }
  }
}
</script>
