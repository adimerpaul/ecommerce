<template>
<!--  tengo imagen dllamda fondoLogin.jpg que no se repita y se extienda-->
  <q-layout style="background-image: url(./fondoLogin.jpg); background-size: cover;">
    <q-page-container>
      <q-page class="q-pa-md">
        <div class="row q-pt-lg">
          <div class="col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <q-card class="bg-white">
              <q-card-section>
                <div class="text-center">
                  <q-img
                    src="logo.png"
                    class="col-12"
                    style="max-width: 100px"
                  />
                </div>
                <div class="text-h6 text-bold">Iniciar sesión</div>
                <div class="text-grey q-py-xs">
                  Inicia sesión para acceder a tu cuenta
                </div>
                <div class="bg-indigo text-center q-ma-xs text-white">
                  El usuario es admin y la contraseña es admin
                </div>
                <q-form @submit="login">
                  <q-input
                    v-model="user.username"
                    filled
                    label="Usuario"
                    lazy-rules
                    :rules="[val => !!val || 'Campo requerido']"
                  />
                  <q-input
                    v-model="user.password"
                    filled
                    label="Contraseña"
                    lazy-rules
                    :type="visible ? 'text' : 'password'"
                    :rules="[val => !!val || 'Campo requerido']"
                  >
                    <template v-slot:append>
                      <q-icon
                        name="visibility"
                        v-if="!visible"
                        class="cursor-pointer"
                        @click="visible = true"
                      />
                      <q-icon
                        name="visibility_off"
                        v-else
                        class="cursor-pointer"
                        @click="visible = false"
                      />
                    </template>
                  </q-input>
                  <q-btn
                    rounded
                    color="primary"
                    label="Iniciar sesión"
                    class="full-width"
                    :loading="loading"
                    type="submit"
                    no-caps
                  />

                  <q-btn
                    flat
                    no-caps
                    :loading="loading"
                    label="¿Olvidaste tu contraseña?"
                    class="full-width"
                  />
                  <q-btn
                    outline
                    rounded
                    no-caps
                    :loading="loading"
                    label="Pagina principal"
                    class="full-width"
                    @click="() => this.$router.push('/')"
                  />
                </q-form>
              </q-card-section>
            </q-card>
          </div>
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>
<script>
export default {
  name: 'LoginLayout',
  data () {
    return {
      loading: false,
      visible: false,
      user: {
        username: 'admin',
        password: 'admin',
      },
    }
  },
  mounted() {
    if (localStorage.getItem('tokenEco')) {
      this.$router.push('/menu')
    }
  },
  methods: {
    login () {
      this.loading = true
      this.$axios
        .post('/login', this.user)
        .then(res => {
          this.$store.user = res.data.user
          this.$store.isLogged = true
          localStorage.setItem('tokenEco', res.data.token)
          this.$axios.defaults.headers.common['Authorization'] = `Bearer ${res.data.token}`
          this.$router.push('/menu')
        })
        .catch((e) => {
          this.$alert.error(e.response.data.message)
        }).finally(() => {
          this.loading = false
        })
    },
  },
}
</script>
