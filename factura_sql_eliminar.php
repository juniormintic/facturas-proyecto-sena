<?php
include 'conexion.php';
$id_factura=$_POST['id'];


$sql = "DELETE FROM factura WHERE id_factura=$id_factura";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
        self.location="factura.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
        windows.history.back()
        </script>';
}
$conn->close();
?>