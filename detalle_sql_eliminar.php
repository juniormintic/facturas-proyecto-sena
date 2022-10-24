<?php
include 'conexion.php';
$id_detalle= $_POST['id_detalle'];
$id_factura=$_POST['id_facturas'];



$sql = "DELETE FROM detalle WHERE id_detalle='".$id_detalle."'";
if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
   self.location="detalles.php?id_factura='.$id_factura.'"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>