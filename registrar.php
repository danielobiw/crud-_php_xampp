<html>

<head>
    <title>Registrar nuevo proveedor</title>
    <link rel="stylesheet" type="text/css" href="estilos1.css">
</head>
<body>

<?php
    if(isset($_POST['enviar'])) {
        $nit=$_POST['nit'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];

        include("conexion.php");
        $sql="INSERT INTO proveedores(nit, nombre, telefono, direccion) values('".$nit."', '".$nombre."', '".$telefono."', '".$direccion."')";

        $resultado=mysqli_query($conexion, $sql);

        if($resultado) {
            echo " <script language='JavaScript'>
            alert('Registro de proveedor exitoso!');
            location.assign('index.php');
            </script>";
        } else {
            echo " <script language='JavaScript'>
            alert('ERROR: No se pudo hacer el registro!');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    } else {
?>

    <h1>Registrar nuevo proveedor</h1>

    <div><a href="index.php">Regresar</a></div>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <label for="">Nit: </label>
        <input type="text" name="nit"> <br>
        <label for="">Nombre: </label>
        <input type="text" name="nombre"> <br>
        <label for="">Telefono: </label>
        <input type="text" name="telefono"> <br>
        <label for="">Dirección: </label>
        <input type="text" name="direccion"> <br>
        <input type="submit" name="enviar" value="Guardar">
    </form>

    <?php
    }
    ?>
</body>

</html>

