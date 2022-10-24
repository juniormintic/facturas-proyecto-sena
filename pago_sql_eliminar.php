<?php
include 'conexion.php';
$pago=$_POST['id'];


$sql = "DELETE FROM modo_pago WHERE num_pago=$pago";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
    self.location="modo_pago.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>


