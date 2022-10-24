<?php
include 'conexion.php';
$id_categoria=$_POST['id'];
//$id= $_POST['id_producto'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];



$sql = "UPDATE categoria SET nombre='$nombre',descripcion='$descripcion' WHERE id_categoria=$id_categoria";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se modifico")
    self.location="categoria.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>