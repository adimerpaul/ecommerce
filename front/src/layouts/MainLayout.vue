<template>
  <q-layout view="lhh Lpr lff" class="bg-grey-2">
    <q-header v-if="visibleHeader"
      style="border-radius:  0 0 0 20px;"
    >
<!--      <q-toolbar>-->
<!--        <q-btn-->
<!--          flat-->
<!--          dense-->
<!--          round-->
<!--          icon="menu"-->
<!--          aria-label="Menu"-->
<!--          @click="toggleLeftDrawer"-->
<!--        />-->

<!--        <q-toolbar-title>-->
<!--          Quasar App-->
<!--        </q-toolbar-title>-->

<!--        <div>Quasar v{{ $q.version }}</div>-->
<!--      </q-toolbar>-->
      <div class="row">
        <div class="col-12 col-md-1"></div>
        <div class="col-12 col-md-10 row items-center">
          <q-avatar size="50px" class="q-ma-xs cursor-pointer" @click="$router.push('/')">
            <q-img src="/logo.png"/>
          </q-avatar>
          <q-space/>
<!--          3 botone s megusta nuscar menu-->
          <q-btn-group flat >
            <q-btn
              flat
              round
              icon="fa-solid fa-heart"
              aria-label="Like"
              @click="favoritosClick"
              >
              <q-badge color="red" floating v-if="$store.favorites.length > 0">
                {{$store.favorites.length}}
              </q-badge>
              <q-tooltip>Ver favoritos</q-tooltip>
            </q-btn>
            <q-btn
              flat
              round
              icon="fa-solid fa-search"
              aria-label="Search">
              <q-tooltip>Buscar</q-tooltip>
            </q-btn>
            <q-btn
              flat
              round
              icon="menu"
              aria-label="Menu"
              @click="toggleLeftDrawer">
              <q-tooltip>Menu</q-tooltip>
            </q-btn>
          </q-btn-group>
        </div>
        <div class="col-12 col-md-1"></div>
      </div>
    </q-header>

<!--    <q-drawer-->
<!--      v-model="leftDrawerOpen"-->
<!--      show-if-above-->
<!--      bordered-->
<!--    >-->
<!--      <q-list>-->
<!--        <q-item-label-->
<!--          header-->
<!--        >-->
<!--          Essential Links-->
<!--        </q-item-label>-->

<!--        <EssentialLink-->
<!--          v-for="link in linksList"-->
<!--          :key="link.title"-->
<!--          v-bind="link"-->
<!--        />-->
<!--      </q-list>-->
<!--    </q-drawer>-->

    <q-page-container>
      <div style="position: relative;" v-if="visibleHeader">
        <div style="position: absolute;height: 40px;width: 100%" class="bg-primary">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 40px; border-radius: 0 20px 0 0" class="bg-grey-2">
          </div>
        </div>
      </div>
      <router-view />
      <q-page-sticky position="bottom-right" :offset="[18, 18]">
        <div>
          <q-btn fab icon="fa-brands fa-whatsapp" color="green" dense type="a" href="https://wa.me/59169603027?text=Hola%20quiero%20comprar%20un%20producto" target="__blank">
            <q-tooltip>Whatsapp</q-tooltip>
          </q-btn>
        </div>
        <div class="q-mt-md">
          <q-btn fab icon="fa-brands fa-shopify" color="primary" dense @click="cartDialog = true">
            <q-tooltip>Carrito</q-tooltip>
            <q-badge color="red" floating v-if="$store.cantidadProductos > 0">
              {{$store.cantidadProductos}}
            </q-badge>
          </q-btn>
        </div>
      </q-page-sticky>
    </q-page-container>
    <q-footer style="border-radius: 20px 20px 0 0">
      <div class="row q-pa-md">
        <div class="col-12 col-md-1"></div>
        <div class="col-12 col-md-10">
          <div class="row">
            <div class="col-12 col-md-3" >
              <div class="text-center">
                <q-avatar size="50px" class="q-ma-xs">
                  <q-img src="/logo.png"/>
                </q-avatar>
                <div class="text-h6 text-bold">
                  Ecommerce
                </div>
                <div>
                  <q-btn-group flat>
                    <q-btn flat size="10px" round icon="fa-brands fa-instagram" aria-label="Instagram" />
                    <q-btn flat size="10px" round icon="fa-brands fa-whatsapp" aria-label="Whatsapp" />
                    <q-btn flat size="10px" round icon="fa-brands fa-facebook" aria-label="Facebook" />
                    <q-btn flat size="10px" round icon="fa-solid fa-user" aria-label="User" />
                  </q-btn-group>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-3 q-px-md" >
                <div class="text-h6 text-bold">
                  Contacto
                </div>
                <div class="">
                  <div>
                    <q-btn flat dense size="10px"  icon="fa-solid fa-envelope" aria-label="Email" label="adimer101@gmail.com" no-caps />
                  </div>
                  <div>
                    <q-btn flat dense size="10px"  icon="fa-solid fa-phone" aria-label="Phone" label="+591 69603027" no-caps />
                  </div>
                  <div>
                    <q-btn flat dense size="10px"  icon="fa-solid fa-map-marker-alt" aria-label="Map" label="Avenida DN y tartawoski #1996" no-caps />
                  </div>
                </div>
            </div>

            <div class="col-12 col-md-3 q-px-md" >
              <div class="text-h6 text-bold">
                Productos
              </div>
              <div class="">
                <div>
                  <q-btn flat dense size="10px"  icon="fa-solid fa-box" aria-label="Products" label="Productos" no-caps />
                </div>
                <div>
                  <q-btn flat dense size="10px"  icon="fa-solid fa-shopping-cart" aria-label="Cart" label="Carrito" no-caps />
                </div>
                <div>
                  <q-btn flat dense size="10px"  icon="fa-solid fa-heart" aria-label="Favorites" label="Favoritos" no-caps />
                </div>
              </div>
            </div>

            <div class="col-12 col-md-3 q-px-md" >
              <div class="text-h6 text-bold">
                Categorias
              </div>
              <div class="">
                <div v-for="(category, index) in categories" :key="index">
                  <q-btn flat dense size="10px"  :icon="category.icon" aria-label="Products" :label="category.name" no-caps />
<!--                  <pre>{{category}}</pre>-->
                </div>
              </div>
            </div>
            <div class="col-12 text-center flex flex-center">
              Desarrollado por
              <q-btn flat dense  icon="fa-brands fa-github" aria-label="Github" label="Adimerpaul" no-caps type="a"
                      href="https://github.com/adimerpaul" target="__blank"/>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-1"></div>
      </div>
    </q-footer>
    <q-dialog v-model="favoritosDialog"
              :position="esMovil ? undefined : 'right'"
              :maximized="true"
              transition-show="slide-left"
              transition-hide="slide-right"
    >
      <q-card style="width: 450px; max-width: 100vw;">
        <q-card-section class="row items-center q-px-md bg-primary text-white q-px-none">
          <q-btn flat round dense icon="fa-solid fa-arrow-left" v-close-popup />
          <q-space/>
          <div class="text-h6">Favoritos</div>
        </q-card-section>
        <q-card-section>
          <q-list separator >
            <q-item v-for="(favorite, index) in $store.favorites" class="cursor-pointer" :key="index">
              <q-item-section avatar @click="redirectProduct(favorite)">
                <q-avatar square size="60px">
                  <q-img :src="`${$url}../images/${searchProducts(favorite)?.imagen1}`"/>
                </q-avatar>
              </q-item-section>
              <q-item-section @click="redirectProduct(favorite)">
                <q-item-label class="text-bold text-grey-8" style="width: 350px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                  {{searchProducts(favorite)?.titulo}}
                </q-item-label>
                <q-item-label class="text-caption">
                  {{searchProducts(favorite)?.category?.name}}
                </q-item-label>
                <q-item-label class="text-caption text-bold">
                  $ {{searchProducts(favorite)?.precio}}
                </q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-btn flat icon="fa-solid fa-trash" size="10px" color="red" aria-label="Delete" @click="deleteFavorite(favorite,$event)" style="z-index: 100"/>
              </q-item-section>
            </q-item>
          </q-list>
<!--          <pre>{{$store.favorites}}</pre>-->
<!--          <pre>{{$store.products}}</pre>-->
        </q-card-section>
<!--        <q-card-actions align="right">-->
<!--          <q-btn flat label="Cerrar" v-close-popup />-->
<!--        </q-card-actions>-->
      </q-card>
    </q-dialog>
    <q-dialog v-model="cartDialog"
              :position="esMovil ? undefined : 'right'"
              :maximized="true"
              transition-show="slide-left"
              transition-hide="slide-right"
    >
      <q-card style="width: 450px; max-width: 100vw;">
        <q-card-section class="row items-center q-px-md bg-primary text-white q-px-none">
          <q-btn flat round dense icon="fa-solid fa-arrow-left" v-close-popup />
          <q-space/>
          <div class="text-h6 cursor-pointer" @click="vaciarCarrito">Variar carrito</div>
        </q-card-section>
        <q-card-section>
          <q-list separator >
            <q-item v-for="(ca, index) in $store.cart" class="cursor-pointer" :key="index">
              <q-item-section avatar @click="redirectProductCart(ca)">
                <q-avatar square size="60px">
                  <q-img :src="`${$url}../images/${ca.imagen1}`"/>
                </q-avatar>
              </q-item-section>
              <q-item-section @click="redirectProductCart(ca)">
                <q-item-label class="text-bold text-grey-8" style="width: 350px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                  {{ca.titulo}}
                </q-item-label>
                <q-item-label class="text-caption">
                  <span v-for="(item, index) in ca.items" :key="index" class="q-pl-xs">
                    {{item}}
                  </span>
                </q-item-label>
                <q-item-label class="text-caption text-bold">
                  $ {{ca.precio}}
                </q-item-label>
              </q-item-section>
              <q-item-section side>
                <div class="items-center">
                  <q-btn square dense rounded color="primary" icon="fa-solid fa-minus" @click="minus(ca)" size="10px" class="q-mr-xs" v-if="ca.cantidad > 1"/>
                  <q-btn flat dense rounded color="red" icon="fa-solid fa-trash" @click="deleteCart(ca,$event)" size="10px" class="q-mr-xs" v-else/>
                  {{ca.cantidad}}
                  <q-btn square dense rounded color="primary" icon="fa-solid fa-plus" @click="more(ca)" size="10px" class="q-ml-xs"/>
                </div>
              </q-item-section>
            </q-item>
          </q-list>
        </q-card-section>
      </q-card>
    </q-dialog>
  </q-layout>
</template>

<script>
export default {
  data() {
    return {
      leftDrawerOpen: false,
      linksList: [
        {title: 'Home', icon: 'home', to: '/'},
        {title: 'About', icon: 'info', to: '/about'},
        {title: 'Contact', icon: 'mail', to: '/contact'}
      ],
      categories: [],
      favoritosDialog: false,
      cartDialog: false,
    }
  },
  mounted() {
    this.categoriesGet();
    if (this.$store.products.length === 0) {
      this.productsGet();
    }
  },
  methods: {
    deleteCart(product,event) {
      event.stopPropagation();
      this.$store.cart.splice(this.$store.cart.indexOf(product), 1);
      localStorage.setItem('cart', JSON.stringify(this.$store.cart));
    },
    minus(product) {
      if (product.cantidad > 1) {
        product.cantidad--;
        localStorage.setItem('cart', JSON.stringify(this.$store.cart));
      }
    },
    more(product) {
      product.cantidad++;
      localStorage.setItem('cart', JSON.stringify(this.$store.cart));
    },
    vaciarCarrito() {
      this.$store.cart = [];
      localStorage.setItem('cart', JSON.stringify([]));
    },
    redirectProduct(product) {
      this.$router.push('/producto/' + product + '/'+ this.searchProducts(product)?.titulo);
    },
    redirectProductCart(product) {
      this.$router.push('/producto/' + product.id + '/'+ product.titulo);
    },
    deleteFavorite(id,event) {
      event.stopPropagation();
      const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
      if (favorites.includes(id)) {
        this.$alert.success('Producto eliminado de favoritos');
        const index = favorites.indexOf(id);
        console.log(index);
        favorites.splice(favorites.indexOf(id.toString()), 1);
        this.$store.favorites.splice(this.$store.favorites.indexOf(id.toString()), 1);
      }
      localStorage.setItem('favorites', JSON.stringify(favorites));
    },
    async productsGet() {
      this.$axios.get('products')
        .then(response => {
          this.$store.products = response.data;
        })
        .catch(e => {
          console.log(e);
        });
    },
    favoritosClick() {
      this.favoritosDialog = true;
    },
    async categoriesGet() {
      try {
        const response = await this.$axios.get('categories');
        this.categories = response.data;
      } catch (e) {
        console.log(e);
      }
    },
    toggleLeftDrawer() {
      this.leftDrawerOpen = !this.leftDrawerOpen
    },
    searchProducts(id) {
      return this.$store.products.find(product => product.id === parseInt(id));
    }
  },
  computed: {
    visibleHeader() {
      if (this.$route.path === '/') {
        return true;
      }else if (!this.$q.screen.lt.md) {
        return true;
      }
      return false;
    },
    esMovil() {
      return this.$q.screen.lt.md;
    }
  }
}
</script>
