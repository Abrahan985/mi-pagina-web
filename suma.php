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

    
    

    <script src="js/jquery.min.js"></script>

    <script src="js/resp/bootstrap.min.js"></script>
    

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
                    <li><a href="">suma </a></li>
                    <li><a href="saludo.php">saludo </a></li>
                </ul>
            </li>

            <li>
              <a href="login.php">Iniciar Sesion</a>
              <ul class="menu-vertical">
                  <li><a href="login.php">login</a></li>
                  

              </ul>
            </li>
            <li>
              <a href="../includes/login.php">Lista</a>
              <ul class="menu-vertical">
                  <li><a href="../views/lista_cli.php">Lista clientes</a></li>
                  <li><a href="../views/lista_pr.php">Lista productos</a></li>
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
            <article class="p-3 mb-2 bg-light text-dark">
  <body>
    
              
 <h2> Suma de 2 números </h2>   
<?php
 $SN1=(isset($_POST['N1']) ? $_POST['N1'] : '');
 $SN2=(isset($_POST['N2']) ? $_POST['N2'] : '');
 ?>
<form action="suma.php" method="post">
     <p> Ingrese N1<input type="text" id="N1" name="N1" value ="<?php echo $SN1?>"/></p>
     <p> Ingrese N2<input type="text" id="N2" name="N2" value ="<?php echo $SN2?>"/> </p>
     <p> <input type="submit" value="Enviar"/>
</form>
<?php 
    if (isset($_POST['N1']) ){
        $N1=$_POST['N1'];
        $N2=$_POST['N2'];
        $T=$N1+$N2;
    echo "<h2> la suma es ".$T." </h2>";
    }
 ?>
  </body> 
</article

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