
@extends('principal')
@section('contenido')
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
                <i class="fa fa-align-justify"></i>Agregar Usuario
            </div>
            <div class="card-body">
                <form method="post" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nombre Completo" name="nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tipo de Documento</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Tipo de Documento" name="nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Número</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Número de Documento" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Dirección</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Dirección" name="correo" required>
                    </div>        

                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Telefono" name="correo" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo" name="correo" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Rol</label>
                        <select class="form-control col-md-3" id="opcion" name="opcion">               
                          <option value="nombre">Administrador</option>
                          <option value="descripcion">Esclavo</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Usuario" name="correo" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contraseña</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Contraseña" name="correo" required>
                    </div>

                    <button type="submit" name="agregar" class="btn btn-primary btn-sm waves-effect waves-light">Agregar</button>
                </form>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
</main>
@endsection