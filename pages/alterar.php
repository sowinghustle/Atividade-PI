<?php
     error_reporting(0);
$id=mysqli_connect("localhost", "root", "");
$con=mysqli_select_db($id, "aula3" );


         $cod = $_POST['cod'];
         $nome = $_POST['nome'];
         $email = $_POST['email'];
         $senha = $_POST['senha'];
         $sql = 'UPDATE usuarios set usu_cod = '.$cod.', usu_nome = "'.$nome.'", usu_email = "'.$email.'", usu_senha = "'.$senha.'"  where usu_cod = "'.$cod.'"';

    mysqli_query($id, $sql) or die(mysqli_error($id));

    mysqli_close($id);
    header("location:listagem.php");



    ?>