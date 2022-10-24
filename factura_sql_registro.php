<?php
include 'conexion.php';
$id_factura=$_POST['id_factura'];
$id_cli=$_POST['id_cliente'];
$fecha= $_POST['fecha'];
$id_ven= $_POST['id_vendedor'];
$num_pago= $_POST['num_pago'];




$sql = "INSERT INTO factura (id_facturas,id_cliente,fecha,id_vendedor,num_pago)
VALUES ('".$id_factura."', '".$id_cli."',  '".$fecha."', '".$id_ven."', '".$num_pago."')";

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


