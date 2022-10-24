<?php
include 'conexion.php';
$id_producto=$_POST['id'];


$sql = "DELETE FROM producto WHERE id_producto=$id_producto";

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
