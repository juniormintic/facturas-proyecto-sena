<?php
include 'conexion.php';
$id_detalle=$_POST['id_detalle'];
$id_factura=$_POST['id_factura'];
$apell= $_POST['id_producto'];
$direc= $_POST['cantidad'];
$fecha= $_POST['precio'];
;



$sql = "INSERT INTO detalle(id_detalle,id_facturas,id_producto,cantidad,precio)
VALUES ('".$id_detalle."', '".$id_factura."', '".$apell."', '".$direc."', '".$fecha."')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
   self.location="detalles.php?id_factura='.$id_factura.'"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

