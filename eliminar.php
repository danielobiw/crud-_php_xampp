
<?php
    $id=$_GET['id'];
    include("conexion.php");

    $sql="DELETE FROM proveedores WHERE ID='".$id."'";
    $resultado=mysqli_query($conexion, $sql);

    if($resultado) {
        echo " <script language='JavaScript'>
        alert('Registro eliminado con exito!');
        location.assign('index.php');
        </script>";
    } else {
        echo " <script language='JavaScript'>
        alert('ERROR: No se pudo eliminar el registro!');
        location.assign('index.php');
        </script>";
    }
?>

