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
                    <li><a href="suma.php">suma </a></li>
                    <li><a href="saludo.php">saludo </a></li>
                    
                </ul>
            </li>

            <li>
              <a href="login.php">Iniciar Sesion</a>
              <ul class="menu-vertical">
                  <li><a href="login.php">login</a></li>
                  <li><a href="ingreso.php">ingreso</a></li>

              </ul>
            </li>
            <li>
              <a href="../includes/login.php">Lista</a>
              <ul class="menu-vertical">
                  <li><a href="lista_clientes.php">Lista clientes</a></li>
                  <li><a href="lista_productos.php">Lista productos</a></li>
                  <li><a href="../views/user.php">Lista de usuarios</a></li>


              </ul>
            </li>

           

            <li>
                <a href="">imprimir</a>
                <ul class ="menu-vertical">
                <li><a href="multi.php">imprimir MULTI</a></li>
                    <li><a href="reporte.php">imprimir PDF</a></li>
                    <li><a href="excel.php">imprimir EXCEL</a></li>
                   <li><a href="boleta.php">imprimir BOLETA</a></li> 
                </ul>
            </li>
            
            
        </ul>
    </nav>
    <div class="contenido">
        <div class="articulos">
            <div class="secciones">
    
            <?php 
session_start();


    $conexion=new mysqli("localhost","root","","ventas");
    if($conexion->connect_errno){
        echo "Conexión no establecida";
        die();
    }
    
    $id_cliente="";
    $apellidos="";
    $nombres="";
    $N=0;


if (isset( $_POST['envio'])){
    
    $operacion=$_POST['envio'];
    
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

?>
<article class="p-3 mb-2 bg-info text-dark">
    <h2>Venta N° <?php echo $N ?></h2>
   <form action="venta01.php" method="POST">
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

    <table border="1">
        <tr>
            <th>N°</th>
            <th>código</th>
            <th>producto</th>
            <th>cantidad</th>
            <th>precio</th>
            <th>subtotal</th>
        </tr>
        <?php 
        // echo '<tr> <td colspan="6"> empezamos con los detalles</td></tr> ';
          //  for($i=1;$i<=$N;$i++){
        ?>
        <tr>
            <td><?php //echo $i?></td><td></td><td></td><td></td><td></td><td></td>
            <td><input type="submit" value="Eliminar" name="envio"></td>
            
        </tr>
        <?php 
        // }
        //     echo '<tr> <td colspan="6">culminamos con los detalles</td></tr> '; 
            
            ?>
        <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td>
            <td><input type="submit" value="Agregar" name="envio"></td>
        </tr>
    </table>
    <?php echo "numero de detalles".$N; ?>
    <td><input type="submit" value="Nuevo" name="envio"></td>
</form>
</article>
<a href='ingreso.php'
        onclick=" if(confirm('¿Deseas salir ?')){
                  }
                  else{ alert('Operacion Cancelada');
                    event.preventDefault();
                  }" 
class="btn btn-danger">Salir <i class="fas fa-exclamation"></i> </a>

 <?php     
    

?>
</div>

            <div class="secciones">
              

            </div>
        </div>
        <div class="menu-secundario">
            <a href="">PESCADOS</a>
            <a href="">ARROCES</a>
            <a href="">CHICHARRONES</a>
            <a href="">PACHAMANCAS</a>
            <a href="">REFRESCOS</a>
            
        </div>
    </div>
    
    <footer>
        <div class="footer-content">
            <h3>Ubicacion</h3>
            <p>Av. Caminito de Huancayo s/n° El tambo Huancayo </p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <img src="../imgs/mapa.jpeg" alt="">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <img src="../imgs/tenedor.jpg" alt="">
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>Celular: 922160108 <span>Telefono: 2425256</span></p>
        </div>
    </footer>	
</body>

