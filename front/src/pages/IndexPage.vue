<template>
  <q-page>
    <div class="row">
      <div class="col-12 col-md-1"></div>
      <div class="col-12 col-md-10">
        <div class="q-pa-sm">
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
        </div>
      </div>
    </div>
    <pre>{{carousels}}</pre>
    <pre>{{carousels}}</pre>
    <pre>{{carousels}}</pre>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      slide: 0,
      carousels: [],
    };
  },
  mounted() {
    this.carouselsGet();
  },
  methods: {
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
};
</script>
