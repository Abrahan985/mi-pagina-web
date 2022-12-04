<?php

$sentencia = "a";

if (isset($_GET['codigo_ven'])) {
    $codigo_ven = $_GET['codigo_ven'];
}


if (isset($_POST["codigo_pro"]) and isset($_POST["codigo_ven"])) {
    $codigo_ven = $_POST["codigo_ven"];
    $codigo_pro = $_POST["codigo_pro"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];

    $sentencia = "insert into detalle (codigo_ven, codigo_pro, cantidad, precio) values ('" . $codigo_ven . "','" . $codigo_pro . "','" . $cantidad . "','" . $precio .  "')";
    // echo $sentencia;
}

$conexion = new mysqli("localhost", "root", "", "r_user");

if ($conexion->connect_errno) {
    echo "error de conexion";
    die();
} else {
    $resultado = $conexion->query($sentencia);
    if ($resultado == 1) {
        // echo "datos guardados correctamente";
    }
}
?>


<body class="">
    <article>
        <div id="site-border-left"></div>
        <div id="site-border-right"></div>
        <div id="site-border-top"></div>
        <div id="site-border-bottom"></div>
        <!-- Add your content of header -->
        <header>
            <nav class="navbar  navbar-fixed-top navbar-default">
                <div class="container">
                </div>
            </nav>
        </header>

        <div class="section-container">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-sm-offset-2 section-container-spacer">
                        <div class="text-center">
                            <h1 class="h2">02: Tienda-Ataucusi</h1>
                            <p>Agregar Productos a la Venta N°
                                <?php echo $codigo_ven ?></p>
                        </div>
                    </div>
                    <section>
                        <div class="col-md-12">
                            <div class="col-1"></div>
                            <div class="col-10" style="margin: auto;">
                                <?php
                                $conexion = new mysqli("localhost", "root", "", "r_user");
                                if ($conexion->connect_errno) {
                                    echo "error de conexion";
                                    die();
                                }
                                $sentencia = 'SELECT * FROM usuarios';

                                //echo $sentencia;

                                $datos = $conexion->query($sentencia);
                                ?>
                                <center>
                                    <article class="bg-secondary col-12">
                                        <h2 class="m-3" style="color: white;">Datos del Producto</h2>
                                        <form action="i_detalle.php" method="post">
                                            <table class="table table-success table-striped">
                                                <tr>
                                                    <td>Código de Venta </td>
                                                    <td><input type="text" name="codigo_ven" readonly="true" value="<?php echo $codigo_ven;?>"> </input></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Código del Producto </td>
                                                    <td><input type="text" name="codigo_pro"> </input></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cantidad:</td>
                                                    <td><input type="text" name="cantidad"> </input></p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Precio:</td>
                                                    <td> <input type="text" name="precio"> </input></p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <input type="submit" value="Guardar">
                                        </form>
                                    </article>
                                </center>



                            </div>
                            <div class="col-1">
                                <?php
                                echo " <a href='detalle_venta.php?codigo_ven=" . $codigo_ven . "'";
                                ?>
                                onclick=" if(confirm('¿Deseas Regresar al Listado?')){
                                }
                                else{ alert('Operacion Cancelada');
                                event.preventDefault();
                                }"
                                <?php
                                echo 'class="btn btn-success">Volver a los detalles de Venta<i class="fas fa-exclamation"></i> </a>';
                                ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </article>
    <?php
    include "../../include/footer.php";
    ?>