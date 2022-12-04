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
    <link rel="stylesheet" href="css/estilo1.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
  
    

    <script src="../js/jquery.min.js"></script>

    <script src="../js/resp/bootstrap.min.js"></script>
    

    <title>Usuarios</title>
</head>
<body>
<h1> Restaurante "Chinita"</h1>
    <nav>
        <ul class ="menu-horizontal">
            
            <li><a href="index1.php">Inicio</a></li>
            <li>
                <a href="">ejercicio</a>
                <ul class="menu-vertical">
                    <li><a href="includes/suma.php">suma </a></li>
                    <li><a href="includes/saludo.php">saludo </a></li>
                    
                </ul>
            </li>

            <li>
              <a href="../includes/login.php">Iniciar Sesion</a>
              <ul class="menu-vertical">
                  <li><a href="includes/login.php">login</a></li>
                  

              </ul>
            </li>
            <li>
              <a href="../includes/login.php">Lista</a>
              <ul class="menu-vertical">
              <li><a href="includes/lista_clientes.php"></a></li>
                  <li><a href="views/lista_cli.php">Lista clientes</a></li>
                  <li><a href="views/lista_pr.php">Lista productos</a></li>
                  <li><a href="views/user.php">Lista de usuarios</a></li>


              </ul>
            </li>

           

            <li>
                <a href="">imprimir</a>
                <ul class ="menu-vertical">
                <li>
                    <li><a href="../includes/reporte.php"></a></li>
                    <a href="includes/multi.php">imprimir MULTI</a></li>
                    <li><a href="includes/lista_productos.php">Lista Pr</a></li>
                    <li><a href="includes/lista_clientes.php">Lista Cli</a></li>
                    <li><a href="includes/boleta.php">BOLETA</a></li>
                </ul>
            </li>
            
            
        </ul>
    </nav>


    <div class="contenido">
        <div class="articulos">
            <div class="secciones">
                <div>
                    <h2>Restaurante "la chinita" les da la bienvenida</h2>
                    <p>Échale un vistazo a la carta peruana. Este restaurante bien pudiera 
                        recomendarse solo por su generoso ceviche mixto, su casero laing y 
                        su tierno cerdo. Empieza tu comida con una deliciosa limonada.
                        Su bien entrenado personal da la bienvenida a los visitantes todo 
                        el año. Una serie de clientes consideran que el servicio es bien valorado. Pagarás unos precios justos cuando comas en Cevicheria DsuMare. No te pierdas su hogareño ambiente</p>
                </div>
                <div><img src="imgs/inicio.jpg"></div>
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
                <img src="imgs/mapa.jpeg" alt="">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <img src="imgs/tenedor.jpg" alt="">
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