<template>
    <main class="main">
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <div class="container-fluid">
          <!-- Ejemplo de tabla Listado -->
          <div class="card">
              <div class="card-header">
                  <i class="fa fa-align-justify"></i> Articulos
                  <button type="button" class="btn btn-secondary" @click="abrirModal('articulo', 'registrar')" >
                      <i class="icon-plus"></i>&nbsp;Nuevo
                  </button>
              </div>
              <div class="card-body">
                  <div class="form-group row">
                      <div class="col-md-6">
                          <div class="input-group">
                              <select class="form-control col-md-3" id="opcion" name="opcion">
                                <option value="nombre">Nombre</option>
                                <option value="descripcion">Descripción</option>
                              </select>
                              <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                          </div>
                      </div>
                  </div>
                  <table class="table table-bordered table-striped table-sm">
                      <thead>
                          <tr>
                              <th>Opciones</th>
                              <th>Codigo</th>
                              <th>Nombre</th>
                              <th>Categoria</th>
                              <th>Precio</th>
                              <th>Stock</th>
                              <th>Descripción</th>
                              <th>Estado</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr v-for="articulo in arrayArticulo" :key="articulo.id">
                              <td>
                                  <button type="button" class="btn btn-warning btn-sm" @click="abrirModal('articulo', 'actualizar', articulo)">
                                    <i class="icon-pencil"></i>
                                  </button> &nbsp;
                                  
                                  <template v-if="articulo.condicion">
                                    <button type="button" class="btn btn-danger btn-sm" @click="desactivarArticulo(articulo.id)">
                                      <i class="icon-trash"></i>
                                    </button>
                                  </template>

                                  <template v-else>
                                    <button type="button" class="btn btn-info btn-sm" @click="activarArticulo(articulo.id)">
                                      <i class="icon-check"></i>
                                    </button>
                                  </template>
                                  
                              </td>
                              <td v-text="articulo.codigo"></td>
                              <td v-text="articulo.nombre"></td>
                              <td v-text="articulo.nombre_categoria"></td>
                              <td v-text="articulo.precio_venta"></td>
                              <td v-text="articulo.stock"></td>
                              <td v-text="articulo.descripcion"></td>
                              <td>
                                  <div v-if="articulo.condicion">
                                    <span class="badge badge-success">Activo</span>
                                  </div>
                                  <div v-else>
                                    <span class="badge badge-danger">Desactivado</span>
                                  </div>
                              </td>
                          </tr>                    
                      </tbody>
                  </table>
                  <nav>
                      <ul class="pagination">
                          <li class="page-item">
                              <a class="page-link" href="#">Ant</a>
                          </li>
                          <li class="page-item active">
                              <a class="page-link" href="#">1</a>
                          </li>
                          <li class="page-item">
                              <a class="page-link" href="#">2</a>
                          </li>
                          <li class="page-item">
                              <a class="page-link" href="#">3</a>
                          </li>
                          <li class="page-item">
                              <a class="page-link" href="#">4</a>
                          </li>
                          <li class="page-item">
                              <a class="page-link" href="#">Sig</a>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
          <!-- Fin ejemplo de tabla Listado -->
      </div>
      <!--Inicio del modal agregar/actualizar-->
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true" :class="{'mostrar' : modal}">
          <div class="modal-dialog modal-primary modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" v-text="tituloModal"></h4>
                      <button type="button" class="close" aria-label="Close" @click="cerrarModal()">
                        <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Categoria</label>
                              <div class="col-md-9">
                                  <select class="form-control" v-model="idcategoria">
                                    <option value="0" disabled>Seleccione una Categoria</option>
                                    <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Codigo</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Codigo del articulo" v-model="codigo">
                                  
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Nombre del Articulo" v-model="nombre">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Precio</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Precio del Articulo" v-model="precio_venta">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Stock</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Stock del Articulo" v-model="stock"> 
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Descripción del Articulo" v-model="descripcion">
                              </div>
                          </div>
                          
                          <div v-show="errorArticulo" class="from-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMensaje" :key="error" v-text="error">
                                        
                                    </div>
                                </div>
                          </div>
                          
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                      <button type="button" class="btn btn-primary" v-if="tipoBoton==1" @click="registrarArticulo()">Guardar</button>
                      <button type="button" class="btn btn-primary" v-if="tipoBoton==2" @click="actualizarArticulo()">Actualizar</button>

                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!--Fin del modal-->
  </main>

</template>

<script>
    export default {
        data(){
            return{
                id: 0,
                idcategoria : 0,
                codigo: '',
                nombre: '',
                nombre_categoria: '',
                precio_venta: 0,
                stock: 0,
                descripcion: '',
                arrayArticulo: [],
                modal: 0,
                tituloModal : '',
                tipoBoton: 0,
                errorArticulo: 0,
                errorMostrarMensaje: [],
                arrayCategoria: []
            }
        },
        
        methods: {
            listarArticulo(){
                var articulo = this;
                axios.get('/articulo').then(function (response) {
                    // handle success
                    console.log(response);
                    
                    articulo.arrayArticulo = response.data;
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
            selectCategoria(){
                var articulo = this;
                axios.get('/categoria/selectCategoria').then(function (response) {
                    // handle success
                    console.log(response);
                    var res = response.data;                
                    articulo.arrayCategoria = res.categorias;
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
            registrarArticulo(){
                if(this.validarArticulo()){
                    return;
                }
                
                var articulo = this;
                axios.post('/articulo/agregar', {
                    'idcategoria': this.idcategoria,
                    'codigo': this.codigo,
                    'nombre': this.nombre,
                    'precio_venta': this.precio_venta,
                    'stock': this.stock,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    // handle success
                    articulo.cerrarModal();
                    articulo.listarArticulo();
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
            
            //Metodo para actualizar la categoria
            actualizarArticulo(){
                if(this.validarArticulo()){
                    return;
                }
                
                var articulo = this;
                axios.put('/articulo/actualizar', {
                    'id' : this.id,
                    'idcategoria' : this.idcategoria,
                    'codigo' : this.codigo,
                    'nombre': this.nombre,
                    'precio_venta' : this.precio_venta,
                    'stock' : this.stock,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    // handle success
                    articulo.cerrarModal();
                    articulo.listarArticulo();
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
         
            //Metodo para abrir el modal, modelo (Categoria), accion (Actualizar o Registrar), data (La fila o sea el registro)
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "articulo":{
                        switch(accion){
                            case "registrar":{
                                this.modal = 1;
                                this.nombre = '';
                                this.descripcion = '';
                                this.stock = 0;
                                this.precio_venta = 0;
                                this.codigo = '';
                                this.tituloModal = 'Registrar Articulo';
                                this.tipoBoton = 1;
                                break;
                            }
                            
                            case "actualizar":{
                                this.id = data['id'];
                                this.idcategoria = data['idcategoria'];
                                this.modal = 1;
                                this.nombre = data['nombre'];
                                this.descripcion = data['descripcion'];
                                this.stock = data['stock'];
                                this.precio_venta = data['precio_venta'];
                                this.codigo = data['codigo'];
                                this.tituloModal = 'Actualizar Articulo';
                                this.tipoBoton = 2;
                                break;
                            }
                        }
                    }
                }
                this.selectCategoria();
            },
            cerrarModal(){
                this.modal = 0;
                this.tituloModal = '';
                this.nombre = '';
                this.descripcion = '';
                this.stock = 0;
                this.precio_venta = 0;
                this.codigo = '';
            },
            validarArticulo(){
                this.errorArticulo = 0;
                this.errorMostrarMensaje = [];
                
                if(this.idcategoria == 0){
                    this.errorMostrarMensaje.push("Debe de seleccionar una categoria.");
                }
              
                if(!this.nombre){
                    this.errorMostrarMensaje.push("El nombre no puede estar vacío.");
                }
              
                if(!this.precio_venta){
                    this.errorMostrarMensaje.push("El precio no puede estar vacío.");
                }
              
                if(!this.stock){
                    this.errorMostrarMensaje.push("El stock no puede estar vacío.");
                }
                
                if(this.errorMostrarMensaje.length){
                    this.errorArticulo = 1;
                }
                
                return this.errorArticulo;
            },
            desactivarArticulo(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                  title: 'Seguro que quieres desactivar el Articulo?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    var articulo = this;
                    axios.put('/articulo/desactivar', {
                        'id' : id,
                    }).then(function (response) {
                        // handle success
                        articulo.listarArticulo();
                        swalWithBootstrapButtons.fire(                     
                          'Articulo Desactivado',
                          'El registro ha sido desactivado.',
                          'success'
                        )
                      })
                      .catch(function (error) {
                        // handle error
                        console.log(error);
                      })
                      .finally(function () {
                        // always executed
                      });

                  } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Cancelado',
                      'El registro no se desactivó.',
                      'error'
                    )
                  }
                })
            },
            activarArticulo(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                  title: 'Seguro que quieres activar el Articulo?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    var articulo = this;
                    axios.put('/articulo/activar', {
                        'id' : id,
                    }).then(function (response) {
                        // handle success
                        articulo.listarArticulo();
                        swalWithBootstrapButtons.fire(                     
                          'Articulo Activada',
                          'El registro ha sido activado.',
                          'success'
                        )
                      })
                      .catch(function (error) {
                        // handle error
                        console.log(error);
                      })
                      .finally(function () {
                        // always executed
                      });

                  } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Cancelado',
                      'El registro no se activó.',
                      'error'
                    )
                  }
                })
            }
        },
        
        mounted() {
            console.log('Component mounted.')
            this.listarArticulo();
        }
    }
</script>

<style> 
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        background-color: #3c29297a !important;
        position: absolute !important;
    }  
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style> 
