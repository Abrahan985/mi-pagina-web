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
                  <li><a href="lista_ven.php">Venta</a></li>
                  


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
$conexion=mysqli_connect("localhost","root","","r_user"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE user.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'
    OR telefono  LIKE'%".$busqueda."%'";
	}
  
}


?>
   


			</form>

  <br>


  
      <table class="table table_id  id="table_id>
        <thead class="thead-orange">

                   
                         <thead>    
                         <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Password</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                        
         
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("localhost","root","","r_user");               
$SQL=mysqli_query($conexion,"SELECT user.id, user.nombre, user.correo, user.password, user.telefono,
user.fecha, user.imagen, permisos.rol FROM user
LEFT JOIN permisos ON user.rol = permisos.id");

    while($fila=mysqli_fetch_assoc($SQL)):
    
?>
<tr>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['password']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['fecha']; ?></td>

<td>


<a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-edit"></i> </a>


<a class="btn btn-danger btn-del" href="eliminar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-trash"></i></a>
</td>
</tr>


<?php endwhile;?>

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