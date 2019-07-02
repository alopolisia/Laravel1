<?php
  include "conexion.php";

  $orden = $_POST['orden'];
  $result = "";

  //Insertar una nueva Ubicación
  if($orden == "agregarUbicacion"){
      $id = $_POST['id'];
      
      $sql = "INSERT INTO ubicacion (id) VALUES ('$id')";
      $result = $conn->query($sql);
    
      if ($result === TRUE) {
        //echo "Registro Insertado de Manera Exitosa"."\n";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  //Insertar un nuevo producto
  if($orden == "agregarProducto"){
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      
      $sql = "INSERT INTO productos (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', '$precio')";
      $result = $conn->query($sql);
    
      if ($result === TRUE) {
        //echo "Registro Insertado de Manera Exitosa"."\n";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  //Insertar un nuevo usuario
  if($orden == "agregarUsuario"){
      $usuario = $_POST['usuario'];
      $contra = $_POST['contra'];
      $nombre = $_POST['nombre'];
      $tipo = $_POST['tipo'];
      
      $sql = "INSERT INTO usuarios (usuario, contra, nombre, tipo) VALUES ('$usuario', '$contra', '$nombre', '$tipo')";
      $result = $conn->query($sql);
    
      if ($result === TRUE) {
        //echo "Registro Insertado de Manera Exitosa"."\n";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  //Insertar una nueva existencia
  if($orden == "agregarExistencia"){
      $id_usuario = $_POST['id_usuario'];
      $id_producto = $_POST['id_producto'];
      $existencia = $_POST['existencia'];
      
      $sql = "INSERT INTO existencia_producto (id_usuario, id_producto, existencia) VALUES ('$id_usuario', '$id_producto', '$existencia')";
      $result = $conn->query($sql);
    
      if ($result === TRUE) {
        //echo "Registro Insertado de Manera Exitosa"."\n";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  //Insertar una nueva existencia
  if($orden == "agregarPedido"){
      $id_cliente = $_POST['id_cliente'];
      $id_ubicacion = $_POST['id_ubicacion'];
      $total = $_POST['total'];
      $fecha = $_POST['fecha'];
      $estado = $_POST['estado'];
      
      $sql = "INSERT INTO pedidos (id_cliente, id_ubicacion, total, fecha, estado) VALUES ('$id_cliente', '$id_ubicacion', '$total', '$fecha', '$estado')";
      $result = $conn->query($sql);
    
      if ($result === TRUE) {
        //echo "Registro Insertado de Manera Exitosa"."\n";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  //Insertar una nueva existencia
  if($orden == "agregarPedidoProductos"){
      $id_pedido = $_POST['id_pedido'];
      $id_producto = $_POST['id_producto'];
      $precio = $_POST['precio'];
      $cantidad = $_POST['cantidad'];
      $subtotal = $_POST['subtotal'];
      
      $sql = "INSERT INTO pedido_productos (id_pedido, id_producto, precio, cantidad, subtotal) VALUES ('$id_pedido', '$id_producto', '$precio', '$cantidad', '$subtotal')";
      $result = $conn->query($sql);
    
      if ($result === TRUE) {
        //echo "Registro Insertado de Manera Exitosa"."\n";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }


  $conn->close();
 
?>
