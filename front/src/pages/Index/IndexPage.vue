<template>
  <q-page class="q-pa-xs">
    <div class="row">
      <div class="col-12">
        <div style="overflow-x: auto; white-space: nowrap;position: fixed; top: 0;z-index: 1000;" class="bg-grey-2 q-pa-xs full-width" v-if="visibleHeader">
          <q-btn
            :text-color="tab === category.id ? 'white' : 'black'"
            rounded
            v-for="(category, index) in categories"
            :key="index"
            :class="`text-subtitle1 ${$q.screen.lt.sm ? 'q-ma-xs' : 'q-ma-xs'}`"
            unelevated
            no-caps
            size="12px"
            @click="tab = category.id"
            :color="tab === category.id ? 'primary' : 'grey-4'"
            :icon="category.icon"
            :label="category.nombre"
          />
        </div>
      </div>
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
            :height="$q.screen.lt.sm ? '150px' : '500px'"
          >
            <q-carousel-slide
              v-for="(carousel, index) in carousels"
              :key="index"
              :name="index"
              :img-src="`${$url}../images/${carousel.imagen}`"
            >
            </q-carousel-slide>
          </q-carousel>
          <div style="overflow-x: auto; white-space: nowrap;">
            <q-scroll-observer @scroll="onScroll" />
            <q-btn
              :text-color="tab === category.id ? 'white' : 'black'"
              rounded
              v-for="(category, index) in categories"
              :key="index"
              :class="`text-subtitle1 ${$q.screen.lt.sm ? 'q-ma-xs' : 'q-ma-md'}`"
              unelevated
              no-caps
              @click="tab = category.id"
              size="12px"
              :color="tab === category.id ? 'primary' : 'grey-4'"
              :icon="category.icon"
              :label="category.nombre"
            />
          </div>
<!--          <pre>{{scrollInfo}}</pre>-->
<!--          <pre>{{visibleHeader}}</pre>-->
        </div>
      </div>
      <div class="col-12 col-md-1"></div>
    </div>
    <div class="row">
      <template  v-if="tab==0">
        <div class="col-12">
          <div style="overflow-x: auto; white-space: nowrap; display: flex; justify-content: flex-start;">
            <div v-for="(product, index) in masVendidos" :key="index" >
              <q-card  class="q-ma-sm cursor-pointer" style="width: 220px;" flat  @click="$router.push(`/producto/${product.id}/${espacioGuiones(product.titulo)}`)">
                <q-img
                  :src="`${$url}../images/${product.imagen1}`"
                  :alt="product.titulo"
                  style="height: 130px"
                >
                  <div class="absolute-top-letf q-ma-none bg-primary text-white text-bold" style="padding: 0px 5px;margin: 0;font-size: 11px;">
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
                    <div class="text-grey-7 text-bold q-pa-xs text-center line-through" v-if="product.precioAnterior">
                      $ {{ product.precioAnterior }}
                    </div>
                  </div>
                </q-card-section>
              </q-card>
            </div>
          </div>
        </div>
        <div class="col-12">
          <template v-for="(categoriesProduct, index) in categoriesProducts" :key="index">
            <div class="row">
              <div class="col-12">
                <div class="text-h6 text-bold q-ma-md">
                  {{ categoriesProduct.nombre }}
                </div>
              </div>
              <div class="col-12">
                <div style="overflow-x: auto; white-space: nowrap; display: flex; justify-content: flex-start;">
                  <div style="overflow-x: auto; white-space: nowrap; display: flex; justify-content: flex-start;width: 100%;">
                    <div v-for="(product, index) in categoriesProduct.products" :key="index" >
                      <q-card  class="q-ma-sm cursor-pointer" style="width: 280px;" flat bordered>
                        <q-card-section horizontal>
                          <q-img
                            class="col-4"
                            :src="`${$url}../images/${product.imagen1}`"
                            height="120px"
                          />
                          <q-card-actions vertical class="justify-around q-px-md">
                            <div class="text-grey-7 text-bold"
                                 style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;width: 165px;">
                              {{ product.titulo }}
                            </div>
                            <div class="text-grey-7"
                                 style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;width: 165px;"
                            >
                              {{ product.descripcion }}
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
                </div>
              </div>
            </div>
          </template>
        </div>
      </template>
      <template v-else>
        <template v-for="(categoriesProduct, index) in categoriesProducts" :key="index">
          <div class="row full-width" v-if="categoriesProduct.id === tab">
            <div class="col-12">
              <div class="text-h6 text-bold q-ma-md">
                {{ categoriesProduct.nombre }}
              </div>
            </div>
            <div v-for="(product, index) in categoriesProduct.products" :key="index" class="col-12 col-md-3" >
              <q-card  class="q-ma-sm cursor-pointer"  flat bordered>
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
                    <div class="text-grey-7"
                          :style="`overflow: hidden; text-overflow: ellipsis; white-space: nowrap;width: ${$q.screen.lt.sm ? '230px' : '165px'};`"
                    >
                      {{ product.descripcion }}
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
        </template>
      </template>
    </div>
<!--    <pre>{{masVendidos}}</pre>-->
<!--    <pre>{{categoriesProducts}}</pre>-->
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
      scrollInfo: {},
      tab: 0,
    };
  },
  mounted() {
    this.carouselsGet();
    this.productsGet();
  },
  methods: {
    espacioGuiones(texto) {
      return texto.replace(/ /g, "-");
    },
    onScroll (info) {
      this.scrollInfo = info
    },
    productsGet() {
      this.categories = [{ id: 0, nombre: "Todos" , icon: "fa-solid fa-box"}];
      this.categoriesProducts = [];

      this.$axios
        .get("products")
        .then((response) => {
          this.products = response.data;

          response.data.forEach((product) => {
            if (!this.categories.find((category) => category.id === product.category_id)) {
              this.categories.push({
                id: product.category_id,
                nombre: product.category.name,
                icon: product.category.icon,
              });
            }

            let categoryProducts = this.categoriesProducts.find((category) => category.id === product.category_id);
            if (!categoryProducts) {
              categoryProducts = {
                id: product.category_id,
                nombre: product.category.name,
                products: [],
              };
              this.categoriesProducts.push(categoryProducts);
            }
            categoryProducts.products.push(product);
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
    visibleHeader() {
      if (this.scrollInfo.position?.top>=615 && !this.$q.screen.lt.sm) {
        return true;
      }else if (this.scrollInfo.position?.top>=215 && this.$q.screen.lt.sm) {
        return true;
      }else{
        return false;
      }
    },
  },
};
</script>
