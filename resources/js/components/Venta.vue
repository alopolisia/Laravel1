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
                  <i class="fa fa-align-justify"></i> Ventas
                  <button type="button" class="btn btn-secondary" @click="abrirModal('venta', 'registrar')" >
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
                              <th>Usuario</th>
                              <th>Proveedor</th>
                              <th>Tipo Comprobante</th>
                              <th>Serie Comprobante</th>
                              <th>Numero Comprobante</th>
                              <th>Fecha</th> 
                              <th>Impuesto</th>
                              <th>Total</th>
                              <th>Estado</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr v-for="venta in arrayVenta" :key="venta.idventa">
                              <td>
                                  <button type="button" class="btn btn-warning btn-sm" @click="abrirModal('venta', 'actualizar', venta)">
                                    <i class="icon-pencil"></i>
                                  </button> &nbsp;                                                       
                              </td>
                              <td v-text="venta.usuario"></td>
                              <td v-text="venta.nombre"></td>
                              <td v-text="venta.tipo_comprobante"></td>
                              <td v-text="venta.serie_comprobante"></td>
                              <td v-text="venta.num_comprobante"></td>
                              <td v-text="venta.fecha_hora"></td>
                              <td v-text="venta.impuesto"></td>
                              <td v-text="venta.total_venta"></td>
                              <td>
                                  <div v-if="venta.estado">
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
                              <label class="col-md-3 form-control-label" for="text-input">Tipo de Documento</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Tipo de Documento" v-model="tipo_documento">
                              </div>
                          </div>
                        
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Numero de Documento</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Numero de Documento" v-model="num_documento">
                              </div>
                          </div>
                        
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Direccion del Venta</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Direccion del Venta" v-model="direccion">
                              </div>
                          </div>
                        
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Telefono del Venta</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Telefono del Venta" v-model="telefono">
                              </div>
                          </div>
                        
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Correo del Venta</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Correo del Venta" v-model="email">
                              </div>
                          </div>
                        
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Contacto del Venta</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Contacto del Venta" v-model="contacto">
                              </div>
                          </div>
                        
                          <div class="form-group row">
                              <label class="col-md-3 form-control-label" for="text-input">Telefono del Contacto</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" placeholder="Telefono del Contacto" v-model="telefono_contacto">
                              </div>
                          </div>
                          
                          <div v-show="errorVenta" class="from-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMensaje" :key="error" v-text="error">
                                        
                                    </div>
                                </div>
                          </div>
                          
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                      <button type="button" class="btn btn-primary" v-if="tipoBoton==1" @click="registrarVenta()">Guardar</button>
                      <button type="button" class="btn btn-primary" v-if="tipoBoton==2" @click="actualizarVenta()">Actualizar</button>

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
                idventa: 0,
                nombre: 0,
                usuario: 0,
                nombre: '',
                tipo_comprobante: '',
                num_comprobante: '',
                serie_comprobante: '',
                telefono: '',
                email: '',
                contacto: '',
                telefono_contacto: '',
                arrayVenta: [],
                modal: 0,
                tituloModal : '',
                tipoBoton: 0,
                errorVenta: 0,
                errorMostrarMensaje: []
            }
        },
        
        methods: {
            listarVenta(){
                var venta = this;
                axios.get('/venta').then(function (response) {
                    // handle success
                    console.log(response);
                    
                    venta.arrayVenta = response.data;
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
            registrarVenta(){
                if(this.validarVenta()){
                    return;
                }
                
                var venta = this;
                axios.post('/venta/agregar', {
                    'nombre': this.nombre,
                    'tipo_documento': this.tipo_documento,
                    'num_documento': this.num_documento,
                    'direccion': this.direccion,
                    'telefono': this.telefono,
                    'email': this.email,
                    'contacto': this.contacto,
                    'telefono_contacto': this.telefono_contacto
                }).then(function (response) {
                    // handle success
                    venta.cerrarModal();
                    venta.listarVenta();
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
            
            //Metodo para actualizar la venta
            actualizarVenta(){
                if(this.validarVenta()){
                    return;
                }
                
                var venta = this;
                axios.put('/venta/actualizar', {
                    'idpersona' : this.idpersona,
                    'nombre': this.nombre,
                    'tipo_documento': this.tipo_documento,
                    'num_documento': this.num_documento,
                    'direccion': this.direccion,
                    'telefono': this.telefono,
                    'email': this.email,
                    'contacto': this.contacto,
                    'telefono_contacto': this.telefono_contacto
                }).then(function (response) {
                    // handle success
                    venta.cerrarModal();
                    venta.listarVenta();
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            },
         
            //Metodo para abrir el modal, modelo (Venta), accion (Actualizar o Registrar), data (La fila o sea el registro)
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "venta":{
                        switch(accion){
                            case "registrar":{
                                this.modal = 1;
                                this.nombre = '';
                                this.tipo_documento = '';
                                this.num_documento = '';
                                this.direccion = '';
                                this.telefono = '';
                                this.email = '';
                                this.contacto = '';
                                this.telefono_contacto = '';
                                this.tituloModal = 'Registrar Venta';
                                this.tipoBoton = 1;
                                break;
                            }
                            
                            case "actualizar":{
                                this.idpersona = data['idpersona'];
                                this.modal = 1;
                                this.nombre = data['nombre'];
                                this.tipo_documento = data['tipo_documento'];
                                this.num_documento = data['num_documento'];
                                this.direccion = data['direccion'];
                                this.telefono = data['telefono'];
                                this.email = data['email'];
                                this.contacto = data['contacto'];
                                this.telefono_contacto = data['telefono_contacto'];
                                this.tituloModal = 'Actualizar Venta';
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
                this.tipo_documento = '';
                this.num_documento = '';
                this.direccion = '';
                this.telefono = '';
                this.email = '';
                this.contacto = '';
                this.telefono_contacto = '';
            },
            validarVenta(){
                this.errorVenta = 0;
                this.errorMostrarMensaje = [];
                
                if(!this.nombre){
                    this.errorMostrarMensaje.push("El nombre no puede estar vacío.");
                }
                
                if(!this.contacto){
                    this.errorMostrarMensaje.push("El contacto no puede estar vacío.");
                }
                
                if(this.errorMostrarMensaje.length){
                    this.errorVenta = 1;
                }
                
                return this.errorVenta;
            },
            borrarVenta(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                  title: 'Seguro que quieres eliminar el Venta?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    var venta = this;
                    axios.put('/venta/borrar', {
                        'idpersona' : id,
                    }).then(function (response) {
                        // handle success
                        venta.listarVenta();
                        swalWithBootstrapButtons.fire(                     
                          'Venta Eliminado',
                          'El registro ha sido eliminado.',
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
                      'El registro no se eliminó.',
                      'error'
                    )
                  }
                })
            }
        },
      
        mounted() {
            console.log('Component mounted.')
            this.listarVenta();
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
