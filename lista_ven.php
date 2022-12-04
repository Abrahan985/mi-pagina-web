<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
 
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/estilo1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav.css">
  
    

    <script src="../js/jquery.min.js"></script>

    <script src="../js/resp/bootstrap.min.js"></script>
    

    <title>Usuarios</title>
</head>
<body>
<h1> Restaurante "Chinita"</h1>
    <nav>
        <ul class ="menu-horizontal">
            <li><a href="../index1.php">Inicio</a></li>
            <li>
                <a href="">ejercicio</a>
                <ul class="menu-vertical">
                    <li><a href="../includes/suma.php">suma </a></li>
                    <li><a href="../includes/saludo.php">saludo </a></li>
                </ul>
            </li>

            <li>
              <a href="login.php">Iniciar Sesion</a>
              <ul class="menu-vertical">
                  <li><a href="../includes/login.php">login</a></li>
                  

              </ul>
            </li>

  
            <li>
              <a href="../includes/login.php">Lista</a>
              <ul class="menu-vertical">
                  <li><a href="lista_cli.php">Lista clientes</a></li>
                  <li><a href="lista_pr.php">Lista productos</a></li>
                  <li><a href="user.php">Lista de usuarios</a></li>
                  <li><a href="../includes/venta01.php">Venta</a></li>
                  


              </ul>
            </li>
            <li>
                <a href="">imprimir</a>
                <ul class ="menu-vertical">
                    <li><a href="../includes/reporte.php">Lista Us</a></li>
                    <li><a href="../includes/lista_clientes.php">Lista Cli</a></li>
                    <li><a href="../includes/lista_productos.php">Lista Prp</a></li>
                    <li><a href="../includes/boleta.php">BOLETA</a></li>
                </ul>
            </li>
            
        </ul>
    </nav>

          

<div class="col-xs-12">
		<h1>Lista de usuarios</h1>
    <br>

		<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
				<span class="glyphicon glyphicon-plus"></span> Nuevo usuario   <i class="fa fa-plus"></i> </a></button>

      <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Salir
      <i class="fa fa-power-off" aria-hidden="true"></i>
       </a>

       
       <a href="../includes/reporte.php" class="btn btn-primary"><b>PDF</b> </a>

       
		</div>




  <?php
 
 if (isset($_GET['codigo_ven'])) {

     // echo "Ingresaremos detalles a la Venta: " . $_GET['codigo_ven'];
     $codigo_ven = $_GET['codigo_ven'];
     $sentencia = "select r_user.codigo_cli, clientes.paterno_cli, clientes.materno_cli, clientes.nombre_cli, r_user.fecha from r_user inner join clientes on r_user.codigo_cli=clientes.codigo_cli where codigo_ven='$codigo_ven'";
     // echo $sentencia;

     $conexion = new mysqli("localhost", "root", "", "r_user");
     if ($conexion->connect_errno) {
         echo "error de conexion";
         die();
     } else {
         $resultado = $conexion->query($sentencia);
         if ($resultado == 1) {
             $datos = $conexion->query($sentencia);
             $fila = $datos->fetch_assoc();
             $codigo_cli = $fila["codigo_cli"];
             $paterno_cli = $fila["paterno_cli"];
             $materno_cli = $fila["materno_cli"];
             $nombre_cli = $fila["nombre_cli"];
             $fecha = $fila["fecha"];
             // echo "datos recogidos correctamente";
         }
     }
 }
 ?>

<?php
                                    session_start();
                                    $conexion = new mysqli("localhost", "root", "", "r_user");
                                    if ($conexion->connect_errno) {
                                        echo "Conexión no establecida";
                                        die();
                                    }

                                    $id_cliente = "";
                                    $apellidos = "";
                                    $nombres = "";


                                    if (isset($_POST['envio'])) {

                                        $operacion = $_POST['envio'];

                                        if ($operacion=="Buscar"){
                                            $id_cliente=$_POST['id_cliente'];
                                            $sentencia="select * from clientes where codigo_cli='$id_cliente'";
                                    
                                            echo $sentencia;
                                            $datos=$conexion->query($sentencia);
                                            if ($datos->num_rows>=1){
                                                $fila=$datos->fetch_assoc();
                                                $id_cliente=$fila['codigo_cli'];
                                                $apellidos=$fila['paterno_cli']." ".$fila['materno_cli'];
                                                $nombres=$fila['nombre_cli'];
                                            }
                                        }
                                    }
                                        if ($operacion == "Eliminar") {
                                    
                                            echo ("Eliminaremos producto seleccionado");
                                            $cod_producto = $_POST['cod_producto'];
                                            $sentencia = "delete from detalles where codigo_pro = '$cod_producto'";
                                            echo $sentencia;
                                            $resultado = $conexion->query($sentencia);
                                            if ($resultado == 1) {
                                                echo "producto eliminado correctamente";
                                            }
                                        }

                                        
                                    ?>

  
     <form action="lista_ven.php" method="POST">
                                                <table>
                                                <tr>
            <td>Código del cliente</td>
            <td><input type="text" name="id_cliente" id="" value="<?php echo $id_cliente?>"></td>
            <td><input type="submit" value="Buscar" name="envio"></td>
        </tr>
        <tr>
            <td>apellidos </td>
            <td><input type="text" name="apellidos" id="" value="<?php echo $apellidos?>" readonly="true"></td>
        </tr>
        <tr>
            <td>nombres </td>
            <td><input type="text" name="nombres" id="" value="<?php echo $nombres?>" readonly="true"></td>
        </tr>
        <tr>
            <td>fecha </td>
            <td><input type="date" name="fecha" id="" value="<?php echo date("Y-m-d")?>"></td>
        </tr>
                                                </table>

                                                
                                                <table class="table table-light table-striped" border="1">
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>código</th>
                                                        <th>producto</th>
                                                        <th>cantidad</th>
                                                        <th>precio</th>
                                                        <th>subtotal</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    <?php

                                                    $sentencia = "SELECT detalle.cantidad, productos.codigo_pro, productos.nombre, detalle.precio, detalle.cantidad * detalle.precio FROM productos inner JOIN detalle on productos.codigo_pro = detalle.codigo_pro where detalle.codigo_ven='$codigo_ven'";
                                                    // echo $sentencia;
                                                    $i = 1;

                                                    echo '<tr> <td colspan="8"> empezamos con los detalles</td></tr> ';
                                                    $detalle = $conexion->query($sentencia);
                                                    while ($fila = $detalle->fetch_assoc()) {
                                                        $cantidad = $fila['cantidad'];
                                                        $codigo_pro = $fila['codigo_pro'];
                                                        $nombre = $fila['nombre'];
                                                        $precioUni = $fila['precio'];
                                                        $subtotal = $fila['detalle.cantidad * detalle.precio'];

                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $i;
                                                                ?></td>
                                                            <td><?php echo $codigo_pro ?></td>
                                                            <td><?php echo $nombre ?></td>
                                                            <td><?php echo $cantidad ?></td>
                                                            <td><?php echo $precioUni ?></td>
                                                            <td><?php echo $subtotal ?></td>
                                                            <?php
                                                            echo "<td> <a href='E_detalle_venta.php?codigo_ven=" . $codigo_ven . "&codigo_pro=" . $fila['codigo_pro'] . "'";
                                                            ?>
                                                            onclick="if(confirm('¿Deseas eliminar Producto
                                                            <?php echo $codigo_pro; ?>')){
                                                            }
                                                            else{ alert('Operacion Cancelada');
                                                            event.preventDefault();
                                                            }"
                                                            <?php
                                                            echo 'class="btn btn-danger">eliminar <i class="fas fa-trash"></i> </a>';
                                                            echo '</td>';
                                                            ?>
                                                            <?php
                                                            echo "<td> <a href='A_detalle_venta.php?codigo_ven=" . $codigo_ven . "&codigo_pro=" . $fila['codigo_pro'] . "'";
                                                            ?>
                                                            onclick="if(confirm('¿Deseas Actualizar este Detalle
                                                            <?php echo $codigo_ven; ?>')){
                                                            }
                                                            else{ alert('Operacion Cancelada');
                                                            event.preventDefault();
                                                            }"
                                                            <?php
                                                            echo 'class="btn btn-dark">Modificar <i class="fas fa-trash"></i> </a>';
                                                            echo '</td>';
                                                            ?>
                                                        </tr>
                                                    <?php
                                                        $i = $i + 1;
                                                    }
                                                    echo '<tr> <td colspan="8">culminamos con los detalles</td></tr> ';

                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="2">
                                                            
                                                        </td>
                                                    </tr>
                                                </table>
                                                <b class="m-b-5">
                                                    <?php echo "Número de Detalles -->" . $i - 1; ?>
                                                </b>
                                            </form>




<a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-edit"></i> </a>


<a class="btn btn-danger btn-del" href="eliminar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-trash"></i></a>
</td>
</tr>

	</body>
  </table>

  <script>
$('.btn-del').on('click', function(e){
  e.preventDefault();
  const href = $(this).attr('href')

  Swal.fire({
  title: 'Estas seguro de eliminar este usuario?',
  text: "¡No podrás revertir esto!!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar!', 
  cancelButtonText: 'Cancelar!', 
}).then((result)=>{
    if(result.value){
        if (result.isConfirmed) {
    Swal.fire(
      'Eliminado!',
      'El usuario fue eliminado.',
      'success'
    )
  }

        document.location.href= href;
    }   

})
})

  </script>
  
<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>
<script src="../package/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>

<script src="../js/page.js"></script>
<script src="../js/buscador.js"></script>
<script src="../js/user.js"></script>




		<?php include('../index.php'); ?>
            
  
</body>
<br>

</html>