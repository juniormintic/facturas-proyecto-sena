<?php
include 'conexion.php';
$id_categoria=$_POST['id'];


$sql = "DELETE FROM categoria WHERE id_categoria=$id_categoria";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
        self.location="categoria.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
        windows.history.back()
        </script>';
}
$conn->close();
?>
