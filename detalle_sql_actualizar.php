<?php
include 'conexion.php';
$id_detalle=$_POST['id'];
$id_factura=$_POST['id_facturas'];
$id_producto=$_POST['id_producto'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];



$sql = "UPDATE detalle SET id_facturas='$id_factura',id_producto='$id_producto',cantidad='$cantidad',precio='$precio' WHERE id_detalle=$id_detalle";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
  self.location="detalles.php?id_factura='.$id_factura.'"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se ritp>
        alert("La informacion se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>
