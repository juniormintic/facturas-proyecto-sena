<?php
include 'conexion.php';
$id_producto=$_POST['id_producto'];
$nom=$_POST['nombre'];
$pre= $_POST['precio'];
$cat= $_POST['id_categoria'];
$img= $_POST['imagen'];



$sql = "INSERT INTO producto(id_producto,nombre,precio,id_categoria,imagen)
VALUES ('".$id_producto."', '".$nom."', '".$pre."', '".$cat."', '".$img."')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
    self.location="producto.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

