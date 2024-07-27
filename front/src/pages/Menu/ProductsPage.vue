<template>
  <q-page class="q-pa-xs bg-grey-3">
    <q-card>
      <q-card-section class="q-pa">
        <q-table :rows="products" dense wrap-cells :columns="columns" :loading="loading" :rows-per-page-options="[0]" row-key="id">
          <template v-slot:body-cell-actions="props">
            <q-td :props="props" auto-width style="margin: 0px;padding: 0px" >
              <q-btn-dropdown dropdown-icon="more_vert" flat dense style="border: 0px;margin: 0px;padding: 0px" size="13px">
                <q-item clickable v-ripple v-close-popup>
                  <q-item-section avatar>
                    <q-icon name="visibility" />
                  </q-item-section>
                  <q-item-section>Ver</q-item-section>
                </q-item>
                <q-item clickable v-ripple v-close-popup>
                  <q-item-section avatar>
                    <q-icon name="edit" />
                  </q-item-section>
                  <q-item-section>Editar</q-item-section>
                </q-item>
                <q-item clickable v-ripple v-close-popup>
                  <q-item-section avatar>
                    <q-icon name="delete" />
                  </q-item-section>
                  <q-item-section>Eliminar</q-item-section>
                </q-item>
              </q-btn-dropdown>
            </q-td>
          </template>
          <template v-slot:body-cell-titulo="props">
            <q-td :props="props" style="margin: 0px;padding: 0px" >
              <q-img :src="`${$url}../images/${props.row.imagen1}`" style="width: 25px;height: 25px" />
              {{props.row.titulo}}
            </q-td>
          </template>
          <template v-slot:body-cell-masVendido="props">
            <q-td :props="props" auto-width style="margin: 0px;padding: 0px" >
<!--              <q-chip :label="props.row.masVendido" color="primary" dense size="13px" />-->
              <q-toggle v-model="props.row.masVendido" dense false-value="no" true-value="si" :label="props.row.masVendido"
                :color="props.row.masVendido === 'si' ? 'green' : 'grey'" @update:modelValue="updateProducto(props.row)" />
            </q-td>
          </template>
          <template v-slot:top-right>
            <q-btn color="primary" label="Nuevo Producto" no-caps dense icon="add_circle_outline" @click="showNewProduct" />
            <q-input v-model="filter" debounce="300" dense outlined placeholder="Buscar...">
              <template v-slot:prepend>
                <q-icon name="search" />
              </template>
            </q-input>
          </template>
        </q-table>
      </q-card-section>
    </q-card>
<!--    [-->
<!--    {-->
<!--    "id": 1,-->
<!--    "descripcion": "Sigue evolucionando en velocidad con un calzado de carrera hecho para ayudarte a alcanzar nuevos objetivos y récords. Mejora la comodidad y la transpirabilidad con una parte superior rediseñada. Ya sea en una carrera de 10 km o en un maratón, este modelo, al igual que su versión anterior",-->
<!--    "titulo": "Nike Vaporfly NEXT",-->
<!--    "precio": 13,-->
<!--    "masVendido": "si",-->
<!--    "imagen1": "CU4111_301_A_PREM.jpg",-->
<!--    "imagen2": "CU4111_301_E_PREM.jpg",-->
<!--    "imagen3": "CU4111_301_F_PREM.jpg",-->
<!--    "imagen4": "457057-800-800.webp",-->
<!--    "item1": "",-->
<!--    "item2": "",-->
<!--    "item3": "",-->
<!--    "item4": "",-->
<!--    "item5": "",-->
<!--    "item6": "",-->
<!--    "item7": "",-->
<!--    "item8": "",-->
<!--    "item9": "",-->
<!--    "item10": "",-->
<!--    "precioAnterior": 300000,-->
<!--    "stock": 80,-->
<!--    "category_id": 1,-->
<!--    "sub_category_id": 1,-->
<!--    "category": {-->
<!--    "id": 1,-->
<!--    "name": "Zapatillas",-->
<!--    "icon": "fa-solid fa-shoe-prints"-->
<!--    },-->
<!--    "sub_category": {-->
<!--    "id": 1,-->
<!--    "name": "Deportivas"-->
<!--    }-->
<!--    },-->
<!--    ]-->
    <div>
<!--      <pre>{{products}}</pre>-->
    </div>
  </q-page>
</template>
<script>
export default {
  name: 'ProductsPage',
  data () {
    return {
      filter: '',
      products: [],
      product: {},
      categories: [],
      loading: false,
      columns: [
        { name: 'actions', label: 'Acciones', align: 'center' },
        { name: 'titulo', label: 'Titulo', align: 'left', field: row => row.titulo },
        // { name: 'descripcion', label: 'Descripcion', align: 'left', field: row => row.descripcion },
        { name: 'precio', label: 'Precio', align: 'right', field: row => row.precio },
        { name: 'stock', label: 'Stock', align: 'right', field: row => row.stock },
        { name: 'masVendido', label: 'Mas Vendido', align: 'left', field: row => row.masVendido },
        { name: 'category', label: 'Categoria', align: 'left', field: row => row.category.name },
        { name: 'sub_category', label: 'Sub Categoria', align: 'left', field: row => row.sub_category.name },
      ]
    }
  },
  mounted() {
    this.getProducts()
  },
  methods: {
    updateProducto (producto) {
      this.$axios.put(`products/${producto.id}`, { masVendido: producto.masVendido })
        .then(response => {
          this.$alert.success('Producto actualizado')
        })
        .catch(error => {
          this.$alert.error(error.response.data.message)
        })
    },
    showNewProduct () {
      // this.$router.push({ name: 'new-product' })
    },
    getProducts () {
      this.loading = true
      this.$axios.get('products')
        .then(response => {
          this.products = response.data
        })
        .catch(error => {
          this.$alert.error(error.response.data.message)
        }).finally(() => {
          this.loading = false
        })
    }
  },
}
</script>
