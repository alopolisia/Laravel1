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
                  <i class="fa fa-align-justify"></i> Roles
                  <button type="button" class="btn btn-secondary" @click="abrirModal('rol', 'registrar')" >
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
                          <tr v-for="rol in arrayRol" :key="rol.idrol">
                              <td>
                                  <button type="button" class="btn btn-warning btn-sm" @click="abrirModal('rol', 'actualizar', rol)">
                                    <i class="icon-pencil"></i>
                                  </button> &nbsp;
                                  
                                  <template v-if="rol.estado">
                                    <button type="button" class="btn btn-danger btn-sm" @click="desactivarRol(rol.idrol)">
                                      <i class="icon-trash"></i>
                                    </button>
                                  </template>

                                  <template v-else>
                                    <button type="button" class="btn btn-info btn-sm" @click="activarRol(rol.idrol)">
                                      <i class="icon-check"></i>
                                    </button>
                                  </template>
                                  
                              </td>
                              <td v-text="rol.nombre"></td>
                              <td v-text="rol.descripcion"></td>
                              <td>
                                  <div v-if="rol.estado">
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
                          
                          <div v-show="errorRol" class="from-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMensaje" :key="error" v-text="error">
                                        
                                    </div>
                                </div>
                          </div>
                          
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                      <button type="button" class="btn btn-primary" v-if="tipoBoton==1" @click="registrarRol()">Guardar</button>
                      <button type="button" class="btn btn-primary" v-if="tipoBoton==2" @click="actualizarRol()">Actualizar</button>

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
                idrol: 0,
                nombre: '',
                descripcion: '',
                arrayRol: [],
                modal: 0,
                tituloModal : '',
                tipoBoton: 0,
                errorRol: 0,
                errorMostrarMensaje: []
            }
        },
        
        methods: {
            listarRol(){
                var rol = this;
                axios.get('/rol').then(function (response) {
                    // handle success
                    console.log(response);
                    
                    rol.arrayRol = response.data;
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
            registrarRol(){
                if(this.validarRol()){
                    return;
                }
                
                var rol = this;
                axios.post('/rol/agregar', {
                    'nombre': this.nombre,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    // handle success
                    rol.cerrarModal();
                    rol.listarRol();
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
            
            //Metodo para actualizar la rol
            actualizarRol(){
                if(this.validarRol()){
                    return;
                }
                
                var rol = this;
                axios.put('/rol/actualizar', {
                    'idrol' : this.idrol,
                    'nombre': this.nombre,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    // handle success
                    rol.cerrarModal();
                    rol.listarRol();
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
         
            //Metodo para abrir el modal, modelo (Rol), accion (Actualizar o Registrar), data (La fila o sea el registro)
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "rol":{
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
                                this.idrol = data['idrol'];
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
            validarRol(){
                this.errorRol = 0;
                this.errorMostrarMensaje = [];
                
                if(!this.nombre){
                    this.errorMostrarMensaje.push("El nombre no puede estar vacío.");
                }
                
                if(this.errorMostrarMensaje.length){
                    this.errorRol = 1;
                }
                
                return this.errorRol;
            },
            desactivarRol(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                  title: 'Seguro que quieres desactivar la Rol?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    var rol = this;
                    axios.put('/rol/desactivar', {
                        'idrol' : id,
                    }).then(function (response) {
                        // handle success
                        rol.listarRol();
                        swalWithBootstrapButtons.fire(                     
                          'Rol Desactivada',
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
            activarRol(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                  title: 'Seguro que quieres activar la Rol?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    var rol = this;
                    axios.put('/rol/activar', {
                        'idrol' : id,
                    }).then(function (response) {
                        // handle success
                        rol.listarRol();
                        swalWithBootstrapButtons.fire(                     
                          'Rol Activada',
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
            this.listarRol();
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
