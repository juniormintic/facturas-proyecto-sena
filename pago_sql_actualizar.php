<?php
include 'conexion.php';
$id= $_POST['id'];
$nombre=$_POST['nombre'];
$detalle=$_POST['detalle'];


$sql = "UPDATE modo_pago SET nombre='$nombre',otros_detalles='$detalle' WHERE num_pago=$id";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se modifico")
    self.location="modo_pago.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>