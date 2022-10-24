<?php
include 'conexion.php';
$id= $_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$direccion=$_POST['direccion'];
$fecha=$_POST['fecha_nacimiento'];
$tel=$_POST['telefonos'];
$email=$_POST['email'];

$sql = "UPDATE vendedor SET nombre='$nombre', apellido='$apellido', direccion='$direccion', fecha_nacimiento='$fecha', telefonos='$tel', email='$email' WHERE id_vendedor = '$id'";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
        self.location="vendedor.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
        windows.history.back()
        </script>';
}
$conn->close();
?>
