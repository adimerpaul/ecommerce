<template>
  <q-page class="q-pa-xs bg-grey-3">
    <q-card>
      <q-card-section class="q-pa">
        <q-table :rows="products" dense wrap-cells :columns="columns" :loading="loading" :rows-per-page-options="[0]"
                 @rowClick="editProductTable" :filter="filter" no-data-label="No hay productos">
        >
          <template v-slot:body-cell-actions="props">
            <q-td :props="props" auto-width style="margin: 0px;padding: 0px" >
              <q-btn-dropdown dropdown-icon="more_vert" flat dense style="border: 0px;margin: 0px;padding: 0px" size="13px"
                              @click="(event) => { event.stopPropagation() }">
                <q-item clickable v-ripple v-close-popup @click="editProductTable($event, props.row)">
                  <q-item-section avatar>
                    <q-icon name="visibility" />
                  </q-item-section>
                  <q-item-section>
                    Ver
                    <pre>{{props.row}}</pre>
                  </q-item-section>
                </q-item>
                <q-item clickable v-ripple v-close-popup @click="editProductTable($event, props.row)">
                  <q-item-section avatar>
                    <q-icon name="edit" />
                  </q-item-section>
                  <q-item-section>Editar</q-item-section>
                </q-item>
                <q-item clickable v-ripple v-close-popup @click="deleteProduct(props.row)">
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
                :color="props.row.masVendido === 'si' ? 'green' : 'grey'" @update:modelValue="updateProductoVendido(props.row)" />
            </q-td>
          </template>
          <template v-slot:top-right>
            <q-btn color="primary" label="Nuevo Producto" no-caps dense icon="add_circle_outline" @click="showNewProduct" :loading="loading" />
            <q-input v-model="filter" debounce="300" dense outlined placeholder="Buscar...">
              <template v-slot:prepend>
                <q-icon name="search" />
              </template>
            </q-input>
          </template>
        </q-table>
      </q-card-section>
    </q-card>
    <q-dialog v-model="dialog" persistent>
      <q-card style="width: 750px;max-width: 90vw">
        <q-card-section class="row items-center q-pb-none">
          <div class="text-subtitle1 text-bold">
            {{product.id ? 'Editar' : 'Nuevo'}}
            Producto
          </div>
          <q-space />
          <q-btn flat dense icon="close" @click="dialog = false" />
        </q-card-section>
        <q-card-section class="q-pt-none">
          <q-form @submit="formProduct(product)">
          <div class="row">
            <div class="col-6 col-md-3 text-center">
              <q-avatar bordered size="100px" square>
                <q-img :src="imgUrl(product.imagen1)" />
                <q-badge color="white" floating >
                  <q-btn flat dense icon="camera_alt" color="grey" size="9px" @click="clickImagen('imagen1')" />
                  <input type="file" class="hidden" id="file" @change="onFileChange" accept="image/*" />
                </q-badge>
              </q-avatar>
            </div>
            <div class="col-6 col-md-3 text-center">
              <q-avatar bordered size="100px" square>
                <q-img :src="imgUrl(product.imagen2)" />
                <q-badge color="white" floating >
                  <q-btn flat dense icon="camera_alt" color="grey" size="9px" @click="clickImagen('imagen2')" />
                  <input type="file" class="hidden" id="file" @change="onFileChange" accept="image/*" />
                </q-badge>
              </q-avatar>
            </div>
            <div class="col-6 col-md-3 text-center">
              <q-avatar bordered size="100px" square>
                <q-img :src="imgUrl(product.imagen3)" />
                <q-badge color="white" floating >
                  <q-btn flat dense icon="camera_alt" color="grey" size="9px" @click="clickImagen('imagen3')" />
                  <input type="file" class="hidden" id="file" @change="onFileChange" accept="image/*" />
                </q-badge>
              </q-avatar>
            </div>
            <div class="col-6 col-md-3 text-center">
              <q-avatar bordered size="100px" square>
                <q-img :src="imgUrl(product.imagen4)" />
                <q-badge color="white" floating >
                  <q-btn flat dense icon="camera_alt" color="grey" size="9px" @click="clickImagen('imagen4')" />
                  <input type="file" class="hidden" id="file" @change="onFileChange" accept="image/*" />
                </q-badge>
              </q-avatar>
            </div>
            <div class="col-12 col-md-12">
              <label class="text-bold">Descripcion</label>
              <q-input v-model="product.descripcion" dense outlined type="textarea" :rules="[val => !!val || 'Campo requerido']" />
            </div>
            <div class="col-12 col-md-6">
              <label class="text-bold">Titulo</label>
              <q-input v-model="product.titulo" dense outlined :rules="[val => !!val || 'Campo requerido']" />
            </div>
            <div class="col-6 col-md-2">
              <label class="text-bold">Precio</label>
              <q-input v-model="product.precio"  dense outlined type="number" />
            </div>
            <div class="col-6 col-md-2">
              <label class="text-bold">Precio Anterior</label>
              <q-input v-model="product.precioAnterior"  dense outlined type="number" />
            </div>
            <div class="col-12 col-md-2 text-center">
              <label class="text-bold">Mas vendido</label> <br>
              <q-toggle v-model="product.masVendido" dense false-value="no" true-value="si" :label="`${product.masVendido}`"
                :color="product.masVendido === 'si' ? 'green' : 'grey'" />
            </div>
            <div class="col-4 col-md-2">
              <label class="text-bold">Item 1</label>
              <q-select v-model="product.item1" dense outlined :options="items" />
            </div>
            <div class="col-4 col-md-2">
              <label class="text-bold">Item 2</label>
              <q-select v-model="product.item2" dense outlined :options="items" />
            </div>
            <div class="col-4 col-md-2">
              <label class="text-bold">Item 3</label>
              <q-select v-model="product.item3" dense outlined :options="items" />
            </div>
            <div class="col-4 col-md-2">
              <label class="text-bold">Item 4</label>
              <q-select v-model="product.item4" dense outlined :options="items" />
            </div>
            <div class="col-4 col-md-2">
              <label class="text-bold">Item 5</label>
              <q-select v-model="product.item5" dense outlined :options="items" />
            </div>
            <div class="col-4 col-md-2">
              <label class="text-bold">Item 6</label>
              <q-select v-model="product.item6" dense outlined :options="items" />
            </div>
<!--            stock categorias y sbncatero con col*md 4-->
            <div class="col-6 col-md-4">
              <label class="text-bold">Stock</label>
              <q-input v-model="product.stock" dense outlined type="number" />
            </div>
            <div class="col-6 col-md-4">
              <label class="text-bold">Categoria</label>
              <q-select v-model="product.category_id" dense outlined :options="categories"
                        emit-value map-options option-value="id" option-label="name" />
            </div>
            <div class="col-6 col-md-4">
              <label class="text-bold">Sub Categoria</label>
              <q-select v-model="product.sub_category_id" dense outlined :options="subcategories"
                        emit-value map-options option-value="id" option-label="name" />
            </div>
            <div class="col-12 text-right q-mt-xs">
              <q-btn label="Cancelar" color="grey-3" unelevated text-color="black" no-caps v-close-popup :loading="loading" />
              <q-btn label="Guardar" color="positive" unelevated class="q-ml-xs" no-caps type="submit" :loading="loading" />
            </div>
<!--            <pre>{{product}}</pre>-->
          </div>
          </q-form>
        </q-card-section>
      </q-card>
    </q-dialog>
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
      subcategories: [],
      items: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'],
      loading: false,
      dialog: false,
      imgChange: '',
      columns: [
        { name: 'actions', label: 'Acciones', align: 'center' },
        { name: 'titulo', label: 'Titulo', align: 'left', field: row => row.titulo },
        // { name: 'descripcion', label: 'Descripcion', align: 'left', field: row => row.descripcion },
        { name: 'precio', label: 'Precio', align: 'right', field: row => row.precio },
        { name: 'precioAnterior', label: 'Precio Anterior', align: 'right', field: row => row.precioAnterior },
        { name: 'stock', label: 'Stock', align: 'right', field: row => row.stock },
        { name: 'masVendido', label: 'Mas Vendido', align: 'left', field: row => row.masVendido },
        { name: 'category', label: 'Categoria', align: 'left', field: row => row.category.name },
        { name: 'items', label: 'Items', align: 'left', field: row => `${row.item1===null?'':row.item1} ${row.item2===null?'':row.item2} ${row.item3===null?'':row.item3} ${row.item4===null?'':row.item4} ${row.item5===null?'':row.item5} ${row.item6===null?'':row.item6}` },
        { name: 'sub_category', label: 'Sub Categoria', align: 'left', field: row => row.sub_category.name },
      ]
    }
  },
  mounted() {
    this.getProducts()
    this.categorieGet()
    this.subcategorieGet()
  },
  methods: {
    formProduct (producto) {
      //deve selecionar al menos una foto
      if (!producto.imagen1 && !producto.imagen2 && !producto.imagen3 && !producto.imagen4) {
        this.$alert.error('Debe seleccionar al menos una imagen')
        return
      }
      if (producto.id) {
        this.updateProduct(producto)
      } else {
        this.createProduct(producto)
      }
    },
    createProduct (producto) {
      this.loading = true
      this.$axios.post('products', producto)
        .then(response => {
          this.$alert.success('Producto creado')
          this.dialog = false
          this.products.push(response.data)
        })
        .catch(error => {
          this.$alert.error(error.response.data.message)
        }).finally(() => {
        this.loading = false
      })
    },
    updateProduct (producto) {
      this.loading = true
      this.$axios.put(`products/${producto.id}`, producto)
        .then(response => {
          this.$alert.success('Producto actualizado')
          this.dialog = false
          const index = this.products.findIndex(p => p.id === producto.id)
          this.products[index] = {...producto}
        })
        .catch(error => {
          this.$alert.error(error.response.data.message)
        }).finally(() => {
        this.loading = false
      })
    },
    categorieGet () {
      this.$axios.get('categories').then((res) => { this.categories = res.data })
    },
    subcategorieGet () {
      this.$axios.get('subCategories').then((res) => {this.subcategories = res.data})
    },
    imgUrl (img) {
      if (!img) return null
      return img.includes('base64') ? img : `${this.$url}../images/${img}`
    },
    clickImagen (img) {
      this.imgChange = img
      document.getElementById('file').click()
    },
    onFileChange (e) {
      const file = e.target.files[0]
      const reader = new FileReader()
      reader.readAsDataURL(file)
      reader.onload = e => {

        this.product[this.imgChange] = e.target.result

        const formData = new FormData()
        formData.append('file', file)
        formData.append('field', this.imgChange)

        this.$axios.post('uploadProduct/'+this.product.id, formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
          .then(response => {
            this.$alert.success('Imagen subida')
            console.log(response)
            if (response.data.esImagen){
              this.product[response.data.field] = response.data.name
            }else{
              this.product = {...response.data}
              const index = this.products.findIndex(p => p.id === this.product.id)
              this.products[index] = {...this.product}
            }
          })
          .catch(error => {
            this.$alert.error(error.response.data.message)
          })
      }
    },
    deleteProduct (producto) {
      this.$q.dialog({
        title: 'Eliminar',
        message: '¿Está seguro de eliminar este producto?',
        ok: 'Si',
        cancel: 'No'
      }).onOk(() => {
        this.loading = true
        this.$axios.delete(`products/${producto.id}`)
          .then(response => {
            this.$alert.success('Producto eliminado')
            this.products = this.products.filter(p => p.id !== producto.id)
          })
          .catch(error => {
            this.$alert.error(error.response.data.message)
          }).finally(() => {
            this.loading = false
          })
      })
    },
    editProductTable (event, row) {
      this.dialog = true
      this.product = {...row}
    },
    updateProductoVendido (producto) {
      this.$axios.put(`products/${producto.id}`, { masVendido: producto.masVendido })
        .then(response => {
          this.$alert.success('Producto actualizado')
        })
        .catch(error => {
          this.$alert.error(error.response.data.message)
        })
    },
    showNewProduct () {
      this.dialog = true
      this.product = {
        id: null,
        descripcion: '',
        titulo: '',
        precio: 0,
        masVendido: 'no',
        imagen1: '',
        imagen2: '',
        imagen3: '',
        imagen4: '',
        item1: '',
        item2: '',
        item3: '',
        item4: '',
        item5: '',
        item6: '',
        item7: '',
        item8: '',
        item9: '',
        item10: '',
        precioAnterior: 0,
        stock: 0,
        category_id: 1,
        sub_category_id: 1
      }
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
