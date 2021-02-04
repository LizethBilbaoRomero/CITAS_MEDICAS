<?php
require __DIR__ . "/configuracion.php";
$conexion = conexion();

$resultado = $conexion->query("SELECT
cita.*,
usuario.nombres, 
usuario.apellidos
FROM
usuario
INNER JOIN
cita
ON 
    usuario.id = cita.usuario_id");
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Historial médico</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="emergencia" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Nombre y Apellidos</th>
                                                <th>Escuela</th>
                                                <th>Especialidad</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php while ($fila = $resultado->fetch_array(MYSQLI_NUM)) : ?>
                                                        <tr>
                                                            <td><?php echo $fila[0];?></td>
                                                            <td><?php echo $fila[3];?> <?php echo $fila[4];?></td>
                                                            <td><?php echo $fila[2];?></td>
                                                            <td><?php echo $fila[1];?></td>
                                                            <td><?php echo $fila[2];?></td>
                                                            <td><?php echo $fila[7];?></td>
                                                        </tr>
                                                <?php endwhile; ?>
                                            <tr>
                                                <th>N°</th>
                                                <th>Nombre y Apellidos</th>
                                                <th>Escuela</th>
                                                <th>Especialidad</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                            </tr>
                                            </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</body>

</html>