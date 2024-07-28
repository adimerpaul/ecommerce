<template>
  <q-page class="q-pa-xs bg-grey-3">
      <q-card class="q-pa-xs">
          <q-card-section>
              <q-table :rows="categories" dense :rows-per-page-options="[0]" :columns="columns" :filter="search" :loading="loading">
                <template v-slot:top-right>
                  <q-btn dense icon="add_circle_outline" color="primary" label="Crear" no-caps :loading="loading" @click="createCategory"></q-btn>
                  <q-input v-model="search" dense debounce="300" placeholder="Buscar..." outlined>
                    <template v-slot:append>
                      <q-icon name="search" />
                    </template>
                  </q-input>
                </template>
                <template v-slot:body="props">
                  <q-tr :props="props">
                    <q-td :props="props" auto-width key="option" style="padding: 0;margin: 0;">
                      <q-btn flat dense icon="edit" @click="editCategory(props.row)" size="10px"></q-btn>
                      <q-btn flat dense icon="delete" @click="deleteCategory(props.row)" size="10px"></q-btn>
                    </q-td>
                    <q-td :props="props" key="id">{{ props.row.id }}</q-td>
                    <q-td :props="props" key="name">{{ props.row.name }}</q-td>
                    <q-td :props="props" key="icon">
                      <q-icon :name="props.row.icon" size="15px" color="primary"></q-icon>
                      {{ props.row.icon }}
                    </q-td>
                  </q-tr>
                </template>
              </q-table>
          </q-card-section>
      </q-card>
    <q-dialog v-model="dialog" persistent>
      <q-card style="width: 300px;max-width: 90vw;">
        <q-card-section class="row items-center q-pb-none ">
          <div>
            {{ category.id ? 'Editar' : 'Crear' }} categoría
          </div>
          <q-space></q-space>
          <q-btn flat dense icon="close" v-close-popup></q-btn>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <q-form @submit="category.id === undefined ? storeCategory() : updateCategory()">
            <q-input v-model="category.name" label="Nombre" outlined dense :rules="[val => !!val || 'Este campo es requerido']"></q-input>
            <q-input v-model="category.icon" label="Icono" outlined dense :rules="[val => !!val || 'Este campo es requerido']"></q-input>
            <div class="text-right">
              <q-btn label="Cancelar" color="grey-3" v-close-popup text-color="black" no-caps :loading="loading"></q-btn>
              <q-btn :label="category.id ? 'Actualizar' : 'Crear'" color="primary" class="q-ml-md" type="submit" no-caps :loading="loading"></q-btn>
            </div>
          </q-form>
<!--          <pre>{{ category }}</pre>-->
        </q-card-section>
      </q-card>
    </q-dialog>
  </q-page>
</template>
<script>
export default {
  name: 'CategoryPage',
  data () {
    return {
      search: '',
      columns: [
        { name: 'option', label: 'Opciones', align: 'center', field: row => row.id },
        { name: 'id', label: 'ID', align: 'center', field: row => row.id },
        { name: 'name', label: 'Nombre', align: 'left', field: row => row.name },
        { name: 'icon', label: 'Icono', align: 'left', field: row => row.icon }
      ],
      categories: [],
      category: {},
      dialog: false,
      loading: false
    }
  },
  mounted() {
    this.loading = true
    this.$axios.get('categories').then(response => {
        this.categories = response.data
    }).finally(() => {
        this.loading = false
    })
  },
  methods: {
    storeCategory() {
      console.log(this.category)
      this.loading = true
      this.$axios.post('categories', this.category).then(response => {
        this.categories.push(response.data)
        this.dialog = false
      }).finally(() => {
        this.loading = false
      })
    },
    updateCategory() {
      console.log(this.category)
      this.loading = true
      this.$axios.put(`categories/${this.category.id}`, this.category).then(response => {
        const index = this.categories.findIndex(c => c.id === response.data.id)
        this.categories.splice(index, 1, response.data)
        this.dialog = false
      }).finally(() => {
        this.loading = false
      })
    },
    createCategory() {
      this.dialog = true
      this.category = {
        name: '',
        icon: ''
      }
    },
    editCategory(category) {
      this.dialog = true
      this.category = { ...category }
    },
    deleteCategory(category) {
      this.$alert.confirm('¿Estás seguro de eliminar esta categoría?').onOk(() => {
        this.loading = true
        this.$axios.delete(`categories/${category.id}`).then(() => {
          this.categories = this.categories.filter(c => c.id !== category.id)
        }).finally(() => {
          this.loading = false
        })
      })
    }
  }
}
</script>
