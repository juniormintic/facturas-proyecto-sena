<?php
include 'conexion.php';
$id_vendedor=$_POST['id'];


$sql = "DELETE FROM vendedor WHERE id_vendedor=$id_vendedor";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
    self.location="vendedor.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

