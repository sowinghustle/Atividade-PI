<?php
     error_reporting(0);
$id=mysqli_connect("localhost", "root", "");
$con=mysqli_select_db($id, "aula3");


    $cod = $_GET['cod'];
     $sql = "delete from usuarios where usu_cod=$cod" ; 

    mysqli_query($id, $sql);

    mysqli_close($id);
    header("location:listagem.php");
    ?>