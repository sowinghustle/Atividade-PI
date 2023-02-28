<?php
$id=mysqli_connect("localhost", "root", "");
$con=mysqli_select_db( $id, "aula3");

$nome=$_POST['usu_nome'];
$email=$_POST['usu_email'];
$senha=$_POST['usu_senha'];



$sql="insert into usuarios (usu_nome, usu_email, usu_senha) 
                    values ('$nome', '$email', '$senha')";
mysqli_query($id, $sql);
mysqli_close($id);

header("location: cadastro.html");
?>