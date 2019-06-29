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
                  <i class="fa fa-align-justify"></i> Categorías
                  <button type="button" class="btn btn-secondary" @click="abrirModal('categoria', 'registrar')" >
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
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Estado</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr v-for="categoria in arrayCategoria" :key="categoria.id">
                              <td>
                                  <button type="button" class="btn btn-warning btn-sm" @click="abrirModal('categoria', 'actualizar', categoria)">
                                    <i class="icon-pencil"></i>
                                  </button> &nbsp;
                                  
                                  <template v-if="categoria.condicion">
                                    <button type="button" class="btn btn-danger btn-sm" @click="desactivarCategoria(categoria.id)">
                                      <i class="icon-trash"></i>
                                    </button>
                                  </template>

                                  <template v-else>
                                    <button type="button" class="btn btn-info btn-sm" @click="activarCategoria(categoria.id)">
                                      <i class="icon-check"></i>
                                    </button>
                                  </template>
                                  
                              </td>
                              <td v-text="categoria.nombre"></td>
                              <td v-text="categoria.descripcion"></td>
                              <td>
                                  <div v-if="categoria.condicion">
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
                              <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Nombre de la categoría" v-model="nombre">
                                  
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Descripción de la categoría" v-model="descripcion">
                              </div>
                          </div>
                          
                          <div v-show="errorCategoria" class="from-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMensaje" :key="error" v-text="error">
                                        
                                    </div>
                                </div>
                          </div>
                          
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                      <button type="button" class="btn btn-primary" v-if="tipoBoton==1" @click="registrarCategoria()">Guardar</button>
                      <button type="button" class="btn btn-primary" v-if="tipoBoton==2" @click="actualizarCategoria()">Actualizar</button>

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
                nombre: '',
                descripcion: '',
                arrayCategoria: [],
                modal: 0,
                tituloModal : '',
                tipoBoton: 0,
                errorCategoria: 0,
                errorMostrarMensaje: []
            }
        },
        
        methods: {
            listarCategoria(){
                var categoria = this;
                axios.get('/categoria').then(function (response) {
                    // handle success
                    console.log(response);
                    
                    categoria.arrayCategoria = response.data;
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
            registrarCategoria(){
                if(this.validarCategoria()){
                    return;
                }
                
                var categoria = this;
                axios.post('/categoria/agregar', {
                    'nombre': this.nombre,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    // handle success
                    categoria.cerrarModal();
                    categoria.listarCategoria();
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
            actualizarCategoria(){
                if(this.validarCategoria()){
                    return;
                }
                
                var categoria = this;
                axios.put('/categoria/actualizar', {
                    'id' : this.id,
                    'nombre': this.nombre,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    // handle success
                    categoria.cerrarModal();
                    categoria.listarCategoria();
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
                    case "categoria":{
                        switch(accion){
                            case "registrar":{
                                this.modal = 1;
                                this.nombre = '';
                                this.descripcion = '';
                                this.tituloModal = 'Registrar Categoría';
                                this.tipoBoton = 1;
                                break;
                            }
                            
                            case "actualizar":{
                                this.id = data['id'];
                                this.modal = 1;
                                this.nombre = data['nombre'];
                                this.descripcion = data['descripcion'];
                                this.tituloModal = 'Actualizar Categoría';
                                this.tipoBoton = 2;
                                break;
                            }
                        }
                    }
                }
            },
            cerrarModal(){
                this.modal = 0;
                this.tituloModal = '';
                this.nombre = '';
                this.descripcion = '';
            },
            validarCategoria(){
                this.errorCategoria = 0;
                this.errorMostrarMensaje = [];
                
                if(!this.nombre){
                    this.errorMostrarMensaje.push("El nombre no puede estar vacío.");
                }
                
                if(this.errorMostrarMensaje.length){
                    this.errorCategoria = 1;
                }
                
                return this.errorCategoria;
            },
            desactivarCategoria(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                  title: 'Seguro que quieres desactivar la Categoria?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    var categoria = this;
                    axios.put('/categoria/desactivar', {
                        'id' : id,
                    }).then(function (response) {
                        // handle success
                        categoria.listarCategoria();
                        swalWithBootstrapButtons.fire(                     
                          'Categoria Desactivada',
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
            activarCategoria(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                  title: 'Seguro que quieres activar la Categoria?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    var categoria = this;
                    axios.put('/categoria/activar', {
                        'id' : id,
                    }).then(function (response) {
                        // handle success
                        categoria.listarCategoria();
                        swalWithBootstrapButtons.fire(                     
                          'Categoria Activada',
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
            this.listarCategoria();
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
