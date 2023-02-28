<?php
$id = mysqli_connect("localhost", "root", "");
$con = mysqli_select_db($id, "aula3");

$email = $_POST['usu_email'];
$senha = $_POST['usu_senha'];

echo "$email";
$sql = "select * from usuarios
        where usu_email='$email';

";
$result = mysqli_query($id, $sql) or die(mysqli_error($id));
while ($obj = mysqli_fetch_array($result)) {

    $senha_obtida = $obj["usu_senha"];

    if ($senha == $senha_obtida) {
        header("location: pagina2.html");
    } else {
        header("location: login.html");
    }
}




mysqli_query($id, $sql);
mysqli_close($id);
