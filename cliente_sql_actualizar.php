<?php
include 'conexion.php';
$id= $_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$direccion=$_POST['direccion'];
$fecha=$_POST['fecha_nacimiento'];
$tel=$_POST['telefono'];
$email=$_POST['email'];

$sql = "UPDATE cliente SET nombre='$nombre', apellido='$apellido', direccion='$direccion', fecha_nacimiento='$fecha_nacimiento', telefono='$tel', email='$email' WHERE id_cliente = '$id'";
       

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
        self.location="cliente.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se actualizo.")
        windows.history.back()
        </script>';
}
$conn->close();
?>




