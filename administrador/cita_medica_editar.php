<?php
require __DIR__ . "/configuracion.php";

$conexion = conexion();

$id = get_get($conexion, "id");

$resultado = $conexion->query("SELECT
cita.*
FROM
cita
WHERE id='$id'");
$cita = $resultado->fetch_array(MYSQLI_NUM);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cita Médica</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php require ROOT_DIR . "/nav.php"; ?>

        <?php require ROOT_DIR . "/aside.php"; ?>


        <div class="content-wrapper pt-3">

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Editar Cita</h3>
                                </div>

                                <div class="card-body">

                                    <form id="editar">
                                        <input type="hidden" value="<?php echo $cita[0] ?>" name="id">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad</label>
                                            <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo $cita[2] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="datatime">Fecha y hora</label>
                                            <input type="text" class="form-control" id="datatime" name="datatime" value="<?php echo $cita[3] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="emergencia">Emergencia</label>
                                            <input type="text" class="form-control" id="emergencia" name="emergencia" value="<?php echo $cita[4] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="usuario">Usuario</label>
                                            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $cita[5] ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Editar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>


        <?php require ROOT_DIR . "/footer.php"; ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/dist/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <script>
        let form = document.getElementById("editar");

        form.addEventListener("submit", function(e) {

            e.preventDefault();

            var formulario = new FormData(document.getElementById("editar"));

            var settings = {
                "url": "/administrador/citamedica-editar.php",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": formulario
            };

            $.ajax(settings)
            .done(function(respuesta) {
                alert(respuesta)
            });
        })
    </script>
</body>

</html>