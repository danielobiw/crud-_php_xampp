
<?php
    include("conexion.php");
?>

<html>

<head>
    <title>Actualizar proveedor</title>
    <link rel="stylesheet" type="text/css" href="estilos1.css">
</head>
<body>

<?php
    if(isset($_POST['enviar'])) {
        $id=$_POST['id'];
        $nit=$_POST['nit'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];

        $sql="UPDATE proveedores SET nit='".$nit."', 
        nombre='".$nombre."', telefono='".$telefono."', 
        direccion='".$direccion."' WHERE id='".$id."' ";
        $resultado=mysqli_query($conexion, $sql);

        if($resultado) {
            echo " <script language='JavaScript'>
            alert('Registro actualizado con exito!');
            location.assign('index.php');
            </script>";
        } else {
            echo " <script language='JavaScript'>
            alert('ERROR: No se pudo hacer la actualizacion!');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    } else {
        $id=$_GET['id'];
        $sql="SELECT * FROM proveedores WHERE id='".$id."'";
        $resultado=mysqli_query($conexion, $sql);

        $fila=mysqli_fetch_assoc($resultado);
        $nit=$fila["nit"];
        $nombre=$fila["nombre"];
        $telefono=$fila["telefono"];
        $direccion=$fila["direccion"];

        mysqli_close($conexion);
?>

    <h1>Actualizar datos de proveedor</h1>

    <div><a href="index.php">Regresar</a></div>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <label for="">Nit: </label>
        <input type="text" name="nit" 
        value="<?php echo $nit; ?>"> <br>
        <label for="">Nombre: </label>
        <input type="text" name="nombre" 
        value="<?php echo $nombre; ?>"> <br>
        <label for="">Telefono: </label>
        <input type="text" name="telefono" 
        value="<?php echo $telefono; ?>"> <br>
        <label for="">Dirección: </label>
        <input type="text" name="direccion" 
        value="<?php echo $direccion; ?>"> <br>

        <input type="hidden" name="id" 
        value="<?php echo $id; ?>"> <br>

        <input type="submit" name="enviar" value="Actualizar">
    </form>

    <?php
    }
    ?>
</body>

</html>

