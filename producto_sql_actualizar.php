<?php
include 'conexion.php';
$id= $_POST['id'];
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];
$categoria=$_POST['categoria'];
$imagen=$_POST['imagen'];

$sql = "INSERT INTO producto (id_producto,nombre,precio,stock,id_categoria,imagen )
VALUES ('".$id."', '".$nombre."',  '".$precio."', '".$stock."', '".$categoria."', '".$imagen."')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
    self.location="producto.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>