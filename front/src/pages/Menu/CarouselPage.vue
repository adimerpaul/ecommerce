<template>
  <q-page class="q-pa-xs bg-grey-3">
    <q-card class="q-pa-xs">
      <q-card-section>
        <q-table :rows="carousels" dense :rows-per-page-options="[0]" :columns="columns" :filter="search" :loading="loading">
          <template v-slot:top-right>
            <q-btn dense icon="add_circle_outline" color="primary" label="Crear" no-caps :loading="loading" @click="createcarousels"></q-btn>
            <q-input v-model="search" dense debounce="300" placeholder="Buscar..." outlined>
              <template v-slot:append>
                <q-icon name="search" />
              </template>
            </q-input>
          </template>
          <template v-slot:body="props">
            <q-tr :props="props">
              <q-td :props="props" auto-width key="option" style="padding: 0;margin: 0;">
                <q-btn flat dense icon="edit" @click="editcarousels(props.row)" size="10px"></q-btn>
                <q-btn flat dense icon="delete" @click="deletecarousels(props.row)" size="10px"></q-btn>
              </q-td>
              <q-td :props="props" key="id">{{ props.row.id }}</q-td>
              <q-td :props="props" key="imagen" style="padding: 0;margin: 0;">
<!--                {{ props.row.imagen }}-->
<!--                <q-avatar square size="150px" style="margin: 0;padding: 0;border: 1px solid #ccc;">-->
                  <q-img :src="`${$url}../images/${props.row.imagen}`" width="120px"/>
<!--                </q-avatar>-->
              </q-td>
<!--              <q-td :props="props" key="icon">-->
<!--                <q-icon :name="props.row.icon" size="15px" color="primary"></q-icon>-->
<!--                {{ props.row.icon }}-->
<!--              </q-td>-->
            </q-tr>
          </template>
        </q-table>
      </q-card-section>
    </q-card>
    <q-dialog v-model="dialog" persistent>
      <q-card style="width: 450px;max-width: 90vw;">
        <q-card-section class="row items-center q-pb-none ">
          <div>
            {{ caroucel.id ? 'Editar' : 'Crear' }} categoría
          </div>
          <q-space></q-space>
          <q-btn flat dense icon="close" v-close-popup></q-btn>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <q-form @submit="caroucel.id === undefined ? storecarousels() : updatecarousels()">
<!--            <q-input v-model="caroucel.name" label="Nombre" outlined dense :rules="[val => !!val || 'Este campo es requerido']"></q-input>-->
<!--            <q-input v-model="caroucel.icon" label="Icono" outlined dense :rules="[val => !!val || 'Este campo es requerido']"></q-input>-->
            <input type="file" @change="caroucel.imagen = $event.target.files[0]" style="margin-bottom: 10px;" accept="image/*">
            <div class="text-right">
              <q-btn label="Cancelar" color="grey-3" v-close-popup text-color="black" no-caps :loading="loading"></q-btn>
              <q-btn :label="caroucel.id ? 'Actualizar' : 'Crear'" color="primary" class="q-ml-md" type="submit" no-caps :loading="loading"></q-btn>
            </div>
          </q-form>
          <!--          <pre>{{ caroucel }}</pre>-->
        </q-card-section>
      </q-card>
    </q-dialog>
<!--    <pre>{{carousels}}</pre>-->
  </q-page>
</template>
<script>
export default {
  name: 'carouselsPage',
  data () {
    return {
      search: '',
      columns: [
        { name: 'option', label: 'Opciones', align: 'center', field: row => row.id },
        { name: 'id', label: 'ID', align: 'center', field: row => row.id },
        { name: 'imagen', label: 'Nombre', align: 'left', field: row => row.name },
        // { name: 'icon', label: 'Icono', align: 'left', field: row => row.icon }
      ],
      carousels: [],
      caroucel: {},
      dialog: false,
      loading: false
    }
  },
  mounted() {
    this.loading = true
    this.$axios.get('carousels').then(response => {
      this.carousels = response.data
    }).finally(() => {
      this.loading = false
    })
  },
  methods: {
    storecarousels() {
      console.log(this.caroucel)
      this.loading = true
      const formData = new FormData()
      formData.append('file', this.caroucel.imagen)
      this.$axios.post('carousels', formData).then(response => {
        this.carousels.push(response.data)
        this.dialog = false
      }).finally(() => {
        this.loading = false
      })
    },
    updatecarousels() {
      console.log(this.caroucel)
      this.loading = true
      const formData = new FormData()
      formData.append('file', this.caroucel.imagen)
      this.$axios.post(`carousels/${this.caroucel.id}`, formData).then(response => {
        const index = this.carousels.findIndex(c => c.id === response.data.id)
        this.carousels.splice(index, 1, response.data)
        this.dialog = false
      }).finally(() => {
        this.loading = false
      })
    },
    createcarousels() {
      this.dialog = true
      this.caroucel = {
        name: '',
        icon: ''
      }
    },
    editcarousels(caroucel) {
      this.dialog = true
      this.caroucel = { ...caroucel }
    },
    deletecarousels(caroucel) {
      this.$alert.confirm('¿Estás seguro de eliminar esta categoría?').onOk(() => {
        this.loading = true
        this.$axios.delete(`carousels/${caroucel.id}`).then(() => {
          this.carousels = this.carousels.filter(c => c.id !== caroucel.id)
        }).finally(() => {
          this.loading = false
        })
      })
    }
  }
}
</script>
