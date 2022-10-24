<?php
include 'conexion.php';
$id_vendedor=$_POST['id_vendedor'];
$nom=$_POST['nombre'];
$apell= $_POST['apellido'];
$direc= $_POST['direccion'];
$fecha= $_POST['fecha_nacimiento'];
$tel= $_POST['telefonos'];
$email= $_POST['email'];



$sql = "INSERT INTO vendedor(id_vendedor,nombre,apellido,direccion,fecha_nacimiento,telefonos,email)
VALUES ('".$id_vendedor."', '".$nom."', '".$apell."', '".$direc."', '".$fecha."', '".$tel."', '".$email."')";

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

