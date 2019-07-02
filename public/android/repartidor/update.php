<?php
  include "conexion.php";

  $orden = $_POST['orden'];
  $result = "";

  //Insertar una nueva Ubicación
  if($orden == "modificarUbicacion"){
      $id = $_POST['id'];
      $id_nuevo = $_POST['id_nuevo'];
      
      $sql = "UPDATE ubicacion SET id='$id_nuevo' WHERE id='$id'";
      $result = $conn->query($sql);
  }

  //Insertar una nueva Ubicación
  if($orden == "modificarProducto"){
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      
      $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id='$id'";
      $result = $conn->query($sql);
  }

  //Insertar una nueva Ubicación
  if($orden == "modificarUsuario"){
      $id = $_POST['id'];
      $usuario = $_POST['usuario'];
      $contra = $_POST['contra'];
      $nombre = $_POST['nombre'];
      
      $sql = "UPDATE usuarios SET usuario='$usuario', contra='$contra', nombre='$nombre' WHERE id='$id'";
      $result = $conn->query($sql);
  }

  //Insertar una nueva Ubicación
  if($orden == "modificarExistencia"){
      $id_usuario = $_POST['id_usuario'];
      $id_producto = $_POST['id_producto'];
      $existencia = $_POST['existencia'];
      
      $sql = "UPDATE existencia_producto SET existencia='$existencia' WHERE id_usuario='$id_usuario' AND id_producto='$id_producto' ";
      $result = $conn->query($sql);
  }

  //Modificar un pedido, ya se asignar un repartidor o finalizarlo
  if($orden == "modificarPedido"){
      $tipo = $_POST['tipo'];
      $id_pedido = $_POST['id_pedido'];
      $id_repartidor = "";
      $sql = "";
    
      //Asignar un repartidor
      if($tipo == 1){
        $id_repartidor = $_POST['id_repartidor'];
        $sql = "UPDATE pedidos SET id_repartidor='$id_repartidor' WHERE id='$id_pedido' ";
      }
    
      //Finalizar un pedido
      if($tipo == 2){
        $sql = "UPDATE pedidos SET estado=1 WHERE id='$id_pedido' ";
      }
    
      $result = $conn->query($sql);
  }


  $conn->close();
 
?>
