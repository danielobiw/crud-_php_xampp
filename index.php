<!DOCTYPE html>
<html>

<head>
    <title>Lista de proveedores</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Está seguro que desea eliminar el registro?');
        }
    </script>
    <link rel="stylesheet" type="text/css" href="estilos1.css">
</head>
<body>

<?php
    include("conexion.php");
    $sql="SELECT * FROM proveedores";
    $resultado=mysqli_query($conexion, $sql);
?>

    <div class="container">
        <h1>Lista de proveedores</h1>
        <a href="registrar.php">Registrar nuevo proveedor</a><br><br>

        <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nit</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Opción</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas=mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td><?php echo $filas['id'] ?></td>
                <td><?php echo $filas['nit'] ?></td>
                <td><?php echo $filas['nombre'] ?></td>
                <td><?php echo $filas['telefono'] ?></td>
                <td><?php echo $filas['direccion'] ?></td>
                <td><?php echo "<a href='actualizar.php?id=".$filas['id']."'>ACTUALIZAR</a>"; ?></td>
                <td><?php echo "<a href='eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>ELIMINAR</a>"; ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
        </table>
        <?php
            mysqli_close($conexion);
        ?>
    </div>



</body>

</html>



