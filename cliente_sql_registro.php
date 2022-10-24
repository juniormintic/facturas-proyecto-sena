<?php
include 'conexion.php';
$id_cliente=$_POST['id_cliente'];
$nom=$_POST['nombre'];
$apell= $_POST['apellido'];
$direc= $_POST['direccion'];
$fecha= $_POST['fecha_nacimiento'];
$tel= $_POST['telefono'];
$email= $_POST['email'];



$sql = "INSERT INTO cliente(id_cliente,nombre,apellido,direccion,fecha_nacimiento,telefono,email)
VALUES ('".$id_cliente."', '".$nom."', '".$apell."', '".$direc."', '".$fecha."', '".$tel."', '".$email."')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
    self.location="cliente.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

