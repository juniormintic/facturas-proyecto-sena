<?php
include 'conexion.php';
$id= $_POST['id'];
$nombre=$_POST['nombre'];
$detalle=$_POST['detalle'];


$sql = "INSERT INTO modo_pago (num_pago,nombre,otros_detalles)
VALUES ('".$id."', '".$nombre."',  '".$detalle."')";

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