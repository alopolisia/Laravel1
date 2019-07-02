<?php
  include "conexion.php";

  $orden = $_POST['orden'];
  $result = "";

  //Insertar una nueva Ubicación
  if($orden == "borrarUbicacion"){
      $id = $_POST['id'];
      
      $sql = "DELETE FROM ubicacion WHERE id='$id'";
      $result = $conn->query($sql);
   
  }

  //Borrar Producto
  if($orden == "borrarProducto"){
      $id = $_POST['id'];
      
      $sql = "DELETE FROM productos WHERE id='$id'";
      $result = $conn->query($sql);
  }

  //Borrar usuario
  if($orden == "borrarUsuario"){
      $id = $_POST['id'];
      
      $sql = "DELETE FROM usuarios WHERE id='$id'";
      $result = $conn->query($sql);
  }

  //Borrar usuario
  if($orden == "borrarExistencia"){
      $id_usuario = $_POST['id_usuario'];
      
      $sql = "DELETE FROM existencia_producto WHERE id_usuario='$id_usuario'";
      $result = $conn->query($sql);
  }

  $conn->close();
 
?>
