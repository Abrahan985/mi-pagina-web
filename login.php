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
                <ul class ="menu-vertical">
                    <li><a href="reporte.php">Lista Us</a></li>
                    <li><a href="lista_clientes.php">Lista Cli</a></li>
                    <li><a href="lista_productos.php">Lista Prp</a></li>
                    <li><a href="boleta.php">BOLETA</a></li>
                </ul>
                </ul>
            </li>
            
        </ul>
    </nav>

<body>
<form  action="_functions.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <br>
           
                   <br>
                                    <h3 class="text-center">Iniciar Sesión</h3>
                       <br>
                            <div class="form-group">
                                <label for="correo">Usuario:</label><br>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                                <input type="hidden" name="accion" value="acceso_user">
                            </div>
                            <div class="form-group">
                             <br>
                    <center>
                                <input type="submit"class="btn btn-success" value="Ingresar">   
                                </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
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
</html>