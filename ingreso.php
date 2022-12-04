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
              <a href="../includes/login.php">Iniciar Sesion</a>
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


<?php 
session_start();
if (isset( $_SESSION['id_usuario'])){
   session_unset();
}



if(isset($_POST["usuario"])){
    $usuario=$_POST["usuario"];
    $clave=$_POST["clave"];
   
    $sentencia='SELECT * FROM usuarios WHERE id_usuario="'.$usuario.'" AND pass="'.$clave.'"';
    $conexion=new mysqli("localhost","root","","ventas");
    $datos=$conexion->query($sentencia);
    if ($datos->num_rows >0){
        echo "ingreso correcto";
        $_SESSION['id_usuario'] = $usuario;
        echo "<script>";
        echo 'window.location.replace("venta01.php")';
        echo "</script>";
    }
    
    
    
    
    
   if($conexion->connect_errno){
       echo "error";
       
   }
   
   
}
else
{
    $usuario="";
    $clave="";
}


 ?>
<article class="p-3 mb-2 bg-light text-dark">
  <?php
 if(isset($_POST["usuario"])){
  echo "<h2>acceso denegado para el usuario $usuario </h2>";
 }
  ?>
    
    <form  action="ingreso.php" method="POST">
        <p>Ingrese Usuario<input type="text" name="usuario" value="<?php echo $usuario?>" ></p>
        <p>Ingrese contraseña<input type="text" name="clave" value="<?php echo $clave?>"></p>
        <p><input type="Submit"></p>
        

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
