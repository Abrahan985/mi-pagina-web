<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ../includes/login.php");
    die();
    

}





$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "", "r_user");
$consulta= "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>


    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">
</head>

<body id="page-top">


<form  action="../includes/_functions.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br>
                            <br>
                            <h3 class="text-center">Editar Producto</h3>
                            
                            <div class="form-group">
                                <label for="username">Codigo Producto</label><br>
                                <input type="text" name="codigo_pro" id="codigo_pro" class="form-control" placeholder="" value="<?php echo $usuario['codigo_pro'];?>">
                            </div>
                            <div class="form-group">
                                  <label for="telefono" class="form-label">Nombre*</label>
                                <input type="tel"  id="nombre_pro" name="nombre_pro" class="form-control" value="<?php echo $usuario['nombre_pro'];?>" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="password">Descripcion</label><br>
                                <input type="text" name="descripcion_pro" id="descripcion_pro" class="form-control" value="<?php echo $usuario['descripcion_pro'];?>" required>
                             
                            </div>

                            <div class="form-group">
                                <input type="number"  id="rol" name="rol" class="form-control" placeholder="" value="<?php echo $usuario['rol'];?>" required>
                                  <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>

                
                                <div class="mb-3">
                                    
                                <button type="submit" class="btn btn-success" >Editar</button>
                               <a href="lista_pr.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>