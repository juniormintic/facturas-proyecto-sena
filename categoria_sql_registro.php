<?php
include 'conexion.php';
$id_categoria=$_POST['id_categoria'];
$nom=$_POST['nombre'];
$descripcion= $_POST['descripcion'];




$sql = "INSERT INTO categoria(id_categoria,nombre,descripcion)
VALUES ('".$id_categoria."', '".$nom."', '".$descripcion."')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
    self.location="categoria.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

