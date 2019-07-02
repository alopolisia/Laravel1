<?php
  include "conexion.php";

  $orden = $_POST['orden'];
  $result = "";

  //Condicion para acceder a las diferentes cuentas de usuario
  if($orden == "acceder"){
      $usuario = $_POST['usuario'];
      $contra = $_POST['contra'];
      
      $sql = "SELECT id, nombre, tipo FROM usuarios where usuario = '$usuario' AND contra = '$contra' ";
      $result = $conn->query($sql);
    
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id"]. "," . $row["nombre"]. "," . $row["tipo"]. "\n";
        }   
      } else {
        echo "0";
      }
  }

  //Cargar todas las ubicaciones 
  if($orden == "cargarUbicaciones"){

      $sql = "SELECT * FROM ubicacion ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id"]. "\n";
        }   
      } else {
        echo "0";
      }
  }

  //Cargar todos los productos
  if($orden == "cargarProductos"){

      $sql = "SELECT * FROM productos ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id"].",". $row["nombre"].",". $row["descripcion"].",". $row["precio"]. "\n";
        }   
      } else {
        echo "0";
      }
  }

  //Cargar existencia de producto de un repartidor en específico
  if($orden == "cargarExistencia"){
      $id_usuario = $_POST['id_usuario'];

      $sql = "SELECT e.id_producto, p.nombre as nombre, existencia FROM existencia_producto e JOIN productos p WHERE id_usuario = '$id_usuario' 
      AND e.id_producto = p.id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id_producto"].",". $row["nombre"].",". $row["existencia"]. "\n";
        }   
      } else {
        echo "0";
      }
  }

  //Cargar usuarios segun el tipo
  if($orden == "cargarUsuarios"){
      $tipo = $_POST['tipo'];

      $sql = "SELECT * FROM usuarios WHERE tipo = '$tipo'"; 
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id"].",". $row["usuario"].",". $row["contra"]. ",". $row["nombre"]. ",". $row["tipo"]. "\n";
        }   
      } else {
        echo "0";
      }
  }

  //Cargar usuarios segun el tipo
  if($orden == "cargarPedidos"){
      $tipo = $_POST['tipo'];
      $sql = "";
      $id_cliente = "";
    
      //Select pedido solicitado de un cliente en especifico
      if($tipo == "0"){
          $id_cliente = $_POST['id_cliente'];
          $sql = "SELECT p.id, p.id_cliente, u1.nombre as cliente, p.id_ubicacion, p.total, p.fecha, p.estado FROM pedidos p LEFT JOIN usuarios as u1 on u1.id = p.id_cliente WHERE p.id_repartidor IS NULL AND p.id_cliente = '$id_cliente'"; 
      }
    
      //Select pedido atendido de un cliente en especifico
      if($tipo == "1"){
          $id_cliente = $_POST['id_cliente'];
          $sql = "SELECT p.id, p.id_cliente, u1.nombre as cliente, p.id_repartidor, u2.nombre as repartidor, p.id_ubicacion, p.total, p.fecha, p.estado FROM pedidos p LEFT JOIN usuarios as u1 on u1.id = p.id_cliente JOIN usuarios as u2 on u2.id = p.id_repartidor WHERE p.estado = 0 AND p.id_cliente = '$id_cliente'";
      }
    
      //Select pedido finalizado de un cliente en especifico
      if($tipo == "2"){
          $id_cliente = $_POST['id_cliente'];
          $sql = "SELECT p.id, p.id_cliente, u1.nombre as cliente, p.id_repartidor, u2.nombre as repartidor, p.id_ubicacion, p.total, p.fecha, p.estado FROM pedidos p LEFT JOIN usuarios as u1 on u1.id = p.id_cliente JOIN usuarios as u2 on u2.id = p.id_repartidor WHERE p.estado = 1 AND p.id_cliente = '$id_cliente'";
      }
    
      //Select pedido pendiente 
      if($tipo == "3"){
          $id_cliente = $_POST['id_cliente'];
          $sql = "SELECT p.id, p.id_cliente, u1.nombre as cliente, p.id_ubicacion, p.total, p.fecha, p.estado FROM pedidos p LEFT JOIN usuarios as u1 on u1.id = p.id_cliente WHERE p.id_repartidor IS NULL"; 
      }
    
      //Select pedido en proceso
      if($tipo == "4"){
          $id_cliente = $_POST['id_cliente'];
          $sql = "SELECT p.id, p.id_cliente, u1.nombre as cliente, p.id_repartidor, u2.nombre as repartidor, p.id_ubicacion, p.total, p.fecha, p.estado FROM pedidos p LEFT JOIN usuarios as u1 on u1.id = p.id_cliente JOIN usuarios as u2 on u2.id = p.id_repartidor WHERE p.estado = 0";
      }
    
      //Select pedido finalizado 
      if($tipo == "5"){
          $id_cliente = $_POST['id_cliente'];
          $sql = "SELECT p.id, p.id_cliente, u1.nombre as cliente, p.id_repartidor, u2.nombre as repartidor, p.id_ubicacion, p.total, p.fecha, p.estado FROM pedidos p LEFT JOIN usuarios as u1 on u1.id = p.id_cliente JOIN usuarios as u2 on u2.id = p.id_repartidor WHERE p.estado = 1";
      }
    
      //Select pedido en proceso
      if($tipo == "6"){
          $id_repartidor = $_POST['id_repartidor'];
          $sql = "SELECT p.id, p.id_cliente, u1.nombre as cliente, p.id_repartidor, u2.nombre as repartidor, p.id_ubicacion, p.total, p.fecha, p.estado FROM pedidos p LEFT JOIN usuarios as u1 on u1.id = p.id_cliente JOIN usuarios as u2 on u2.id = p.id_repartidor WHERE p.estado = 0 AND p.id_repartidor = '$id_repartidor'";
      }
    
      //Select pedido finalizado de un cliente en especifico
      if($tipo == "7"){
          $id_repartidor = $_POST['id_repartidor'];
          $sql = "SELECT p.id, p.id_cliente, u1.nombre as cliente, p.id_repartidor, u2.nombre as repartidor, p.id_ubicacion, p.total, p.fecha, p.estado FROM pedidos p LEFT JOIN usuarios as u1 on u1.id = p.id_cliente JOIN usuarios as u2 on u2.id = p.id_repartidor WHERE p.estado = 1 AND p.id_repartidor = '$id_repartidor'";
      }
 
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id"].",". $row["id_cliente"].",". $row["cliente"]. ",". $row["id_repartidor"]. ",". $row["repartidor"].  ",". $row["id_ubicacion"]. ",". $row["total"]. ",". $row["fecha"]. ",". $row["estado"]. "\n";
        }   
      } else {
        echo "0";
      }
  }

  //Cargar el ultimo id de pedidos
  if($orden == "cargarPedidosMaxId"){

      $sql = "SELECT max(id) as id FROM pedidos";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id"]. "\n";
        }   
      } else {
        echo "0";
      }
  }

  //Cargar productos de un pedido
  if($orden == "cargarPedidoProductos"){
      $id_pedido = $_POST['id_pedido'];

      $sql = "SELECT p.id_pedido, p.id_producto, r.nombre as nombre, p.precio, p.cantidad, p.subtotal FROM pedido_productos p JOIN productos r WHERE id_pedido = '$id_pedido' AND p.id_producto = r.id ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id_pedido"].",". $row["id_producto"].",". $row["nombre"].",". $row["precio"].",". $row["cantidad"].",". $row["subtotal"]. "\n";
        }   
      } else {
        echo "0";
      }
  }


  $conn->close();
	die ('');
 
?>
