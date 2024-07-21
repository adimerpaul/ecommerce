<template>
<q-page>
  <q-carousel
    class="br-20"
    animated
    v-model="slide"
    arrows
    navigation
    autoplay
    infinite
    :height="$q.screen.lt.sm ? '400px' : '500px'"
  >
    <q-carousel-slide :img-src="`${$url}../images/${product.imagen1}`" :name="0">
    </q-carousel-slide>
  </q-carousel>
  <pre>{{`${$url}../images/${product.imagen1}` }}</pre>
    <pre>{{product}}</pre>
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
