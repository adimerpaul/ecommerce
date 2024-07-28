<template>
  <q-page class="q-pa-xs bg-grey-3">
    <q-card class="q-pa-xs">
      <q-card-section>
        <q-table :rows="subCategories" dense :rows-per-page-options="[0]" :columns="columns" :filter="search" :loading="loading">
          <template v-slot:top-right>
            <q-btn dense icon="add_circle_outline" color="primary" label="Crear" no-caps :loading="loading" @click="createSubCategory"></q-btn>
            <q-input v-model="search" dense debounce="300" placeholder="Buscar..." outlined>
              <template v-slot:append>
                <q-icon name="search" />
              </template>
            </q-input>
          </template>
          <template v-slot:body="props">
            <q-tr :props="props">
              <q-td :props="props" auto-width key="option" style="padding: 0;margin: 0;">
                <q-btn flat dense icon="edit" @click="editSubCategory(props.row)" size="10px"></q-btn>
                <q-btn flat dense icon="delete" @click="deleteSubCategory(props.row)" size="10px"></q-btn>
              </q-td>
              <q-td :props="props" key="id">{{ props.row.id }}</q-td>
              <q-td :props="props" key="name">{{ props.row.name }}</q-td>
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
      <q-card style="width: 300px;max-width: 90vw;">
        <q-card-section class="row items-center q-pb-none ">
          <div>
            {{ subcategory.id ? 'Editar' : 'Crear' }} categoría
          </div>
          <q-space></q-space>
          <q-btn flat dense icon="close" v-close-popup></q-btn>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <q-form @submit="subcategory.id === undefined ? storeSubCategory() : updateSubCategory()">
            <q-input v-model="subcategory.name" label="Nombre" outlined dense :rules="[val => !!val || 'Este campo es requerido']"></q-input>
<!--            <q-input v-model="subcategory.icon" label="Icono" outlined dense :rules="[val => !!val || 'Este campo es requerido']"></q-input>-->
            <div class="text-right">
              <q-btn label="Cancelar" color="grey-3" v-close-popup text-color="black" no-caps :loading="loading"></q-btn>
              <q-btn :label="subcategory.id ? 'Actualizar' : 'Crear'" color="primary" class="q-ml-md" type="submit" no-caps :loading="loading"></q-btn>
            </div>
          </q-form>
          <!--          <pre>{{ subcategory }}</pre>-->
        </q-card-section>
      </q-card>
    </q-dialog>
  </q-page>
</template>
<script>
export default {
  name: 'SubCategoryPage',
  data () {
    return {
      search: '',
      columns: [
        { name: 'option', label: 'Opciones', align: 'center', field: row => row.id },
        { name: 'id', label: 'ID', align: 'center', field: row => row.id },
        { name: 'name', label: 'Nombre', align: 'left', field: row => row.name },
        // { name: 'icon', label: 'Icono', align: 'left', field: row => row.icon }
      ],
      subCategories: [],
      subcategory: {},
      dialog: false,
      loading: false
    }
  },
  mounted() {
    this.loading = true
    this.$axios.get('subCategories').then(response => {
      this.subCategories = response.data
    }).finally(() => {
      this.loading = false
    })
  },
  methods: {
    storeSubCategory() {
      console.log(this.subcategory)
      this.loading = true
      this.$axios.post('subCategories', this.subcategory).then(response => {
        this.subCategories.push(response.data)
        this.dialog = false
      }).finally(() => {
        this.loading = false
      })
    },
    updateSubCategory() {
      console.log(this.subcategory)
      this.loading = true
      this.$axios.put(`subCategories/${this.subcategory.id}`, this.subcategory).then(response => {
        const index = this.subCategories.findIndex(c => c.id === response.data.id)
        this.subCategories.splice(index, 1, response.data)
        this.dialog = false
      }).finally(() => {
        this.loading = false
      })
    },
    createSubCategory() {
      this.dialog = true
      this.subcategory = {
        name: '',
        icon: ''
      }
    },
    editSubCategory(subcategory) {
      this.dialog = true
      this.subcategory = { ...subcategory }
    },
    deleteSubCategory(subcategory) {
      this.$alert.confirm('¿Estás seguro de eliminar esta categoría?').onOk(() => {
        this.loading = true
        this.$axios.delete(`subCategories/${subcategory.id}`).then(() => {
          this.subCategories = this.subCategories.filter(c => c.id !== subcategory.id)
        }).finally(() => {
          this.loading = false
        })
      })
    }
  }
}
</script>
