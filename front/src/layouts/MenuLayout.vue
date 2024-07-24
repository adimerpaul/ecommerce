<template>
  <q-layout view="lHh Lpr lFf">
    <q-header class="bg-white text-black" bordered>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title>
          <div class="text-primary text-bold">
            {{title}}
          </div>
        </q-toolbar-title>
        <div>
          <q-btn flat dense icon="o_notifications" aria-label="Notificaciones">
            <q-badge color="primary" text-color="white" floating>3</q-badge>
          </q-btn>
          <q-btn flat dense icon="o_account_circle" aria-label="Menu" :label="textCapitalize($store.user.name)" no-caps icon-right="arrow_drop_down">
            <q-menu>
              <q-list>
                <q-item clickable v-ripple>
                  <q-item-section avatar>
                    <q-avatar icon="account_circle" />
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Perfil</q-item-label>
                  </q-item-section>
                </q-item>
                <q-item clickable v-ripple>
                  <q-item-section avatar>
                    <q-avatar icon="settings" />
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Configuración</q-item-label>
                  </q-item-section>
                </q-item>
                <q-item clickable v-ripple @click="logout">
                  <q-item-section avatar>
                    <q-avatar icon="logout" />
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Cerrar Sesión</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
            </q-menu>
          </q-btn>
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      :width="220"
      class="bg-primary text-white"
    >
      <q-layout>
        <q-header>
          <q-list>
            <q-item-label class="q-pa-xs">
              <q-item dense>
                <q-item-section avatar>
                  <q-avatar class="bg-white" text-color="primary" size="45px">
                    <q-img src="/logo.png" />
                  </q-avatar>
                </q-item-section>
                <q-item-section>
                  <q-item-label class="text-white">
                    <q-chip dense label="Admin" color="grey" text-color="white" icon="account_circle"/>
                  </q-item-label>
                  <q-item-label caption class="text-white">{{ $store.user.name }}</q-item-label>
                </q-item-section>
              </q-item>
            </q-item-label>
            <q-separator dark />
            <q-item clickable dense v-ripple v-for="link in essentialLinks" :key="link.title" :to="link.to" exact :class="`text-white ${rutaActual==link.to?'bg-secondary':''}`">
              <q-item-section avatar>
                <q-avatar  text-color="white" :icon="`${rutaActual==link.to?link.icon:'o_'+link.icon}`" :size="`${rutaActual==link.to?'45px':'38px'}`" />
              </q-item-section>
              <q-item-section>
                <q-item-label :class="`text-white ${rutaActual==link.to?'text-bold':''}`">{{ link.title }}</q-item-label>
              </q-item-section>
            </q-item>

          </q-list>
        </q-header>
        <q-footer>
          <q-item clickable dense v-ripple @click="logout">
            <q-item-section avatar>
              <q-avatar text-color="" icon="logout" size="38px" />
            </q-item-section>
            <q-item-section>
              <q-item-label class="">Cerrar Sesión</q-item-label>
            </q-item-section>
          </q-item>
        </q-footer>
      </q-layout>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
export default {
  data() {
    return {
      leftDrawerOpen: false,
      essentialLinks: [
        { title: 'Inicio', icon: 'home', to: '/menu' },
        { title: 'Productos', icon: 'store', to: '/products' },
        { title: 'Categoria', icon: 'category', to: '/category' },
        { title: 'Subcategoria', icon: 'inventory_2', to: '/sub_category' },
        { title: 'Usuarios', icon: 'people', to: '/users' },
        { title: 'Carousel', icon: 'view_carousel', to: '/carousel'},
        { title: 'Pagina Web', icon: 'web', to: '/'},
      ],
    };
  },
  methods: {
    textCapitalize(text) {
      if (!text) return '';
      const lower = text.toLowerCase();
      return text.charAt(0).toUpperCase() + lower.slice(1);
    },
    toggleLeftDrawer() {
      this.leftDrawerOpen = !this.leftDrawerOpen;
    },
    logout() {
      this.$alert.dialog('¿Está seguro que desea cerrar sesión?').onOk(() => {
        this.$axios.post('/logout').then(() => {
          this.$store.isLogeed = false;
          this.$store.user = {};
          localStorage.removeItem('tokenEco');
          this.$router.push('/login');
        })
      })
    },
  },
  computed: {
    rutaActual() {
      return this.$route.path
    },
    title() {
      const route = this.$route.path
      if (route === '/') return 'Inicio'
      if (route === '/products') return 'Productos'
      if (route === '/category') return 'Categoria'
      if (route === '/sub_category') return 'Subcategoria'
      if (route === '/users') return 'Usuarios'
      if (route === '/carousel') return 'Carousel'
      else
        return 'Inicio'
    },
  },
};
</script>
