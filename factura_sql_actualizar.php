<?php
include 'conexion.php';
$id= $_POST['id'];
$cliente=$_POST['id_cliente'];
$fecha=$_POST['fecha'];
$vendedor=$_POST['id_vendedor'];
$numpago=$_POST['num_pago'];


$sql = "UPDATE factura SET id_cliente='$cliente',fecha='$fecha',id_vendedor='$vendedor',num_pago='$numpago' "
        . "WHERE id_facturas=$id";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
        self.location="factura.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
        windows.history.back()
        </script>';
}
$conn->close();
?>
