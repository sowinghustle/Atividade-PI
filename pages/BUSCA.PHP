<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pesquisa</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- CDN do Bootstrap, estou utilizando a versão mais recente: 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <!-- script do fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/9e3492e6f4.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1>busca</h1>
    <div class="busca">
        <form name="form1" method="POST" action="">
            <div class="labelsBusca">
                <div>
                    <label>Código: </label>
                    <input name="cod" type="number" value=""><br>
                </div>
                <input name="botao" type="submit" value="Pesquisar "><br>
            </div>


            <div class="labelsBusca">
                <div>
                    <label>Nome: </label> <input name="nome" type="text" value=""><br>
                </div>
                <input name="botao" type="submit" value="Pesquisar"><br>
            </div>
            <a href="pagina2.html"><i class="fa-solid fa-arrow-left"></i></a>
        </form>
    </div>

    <?php
    error_reporting(0);
    $id = mysqli_connect("localhost", "root", "");
    $con = mysqli_select_db($id, "aula3");

    if (!empty($_POST['botao'])) {
        if ($_POST['botao'] == 'Pesquisar ') {
            $cod = $_POST['cod'];
            $sql = "Select * from usuarios where usu_cod='$cod'";
        }
        if ($_POST['botao'] == 'Pesquisar') {
            $nome = $_POST['nome'];
            $sql = "Select * from usuarios where usu_nome like '%$nome%'";
        }
        $result = mysqli_query($id, $sql) or die(mysqli_error($id));
        while ($obj = mysqli_fetch_array($result)) {
            $cod = $obj[0];
            $nome = $obj[1];
            $email = $obj[2];
            $senha =  $obj[3];



            echo " 
        <div class=\"busca\">
            <form name=\"formulario\" method=\"post\" action=\"listagem.php\">
                    Codigo: <input name=\"usu_cod\" type=\"text\" value=\"$cod\"><br>
                    Nome: <input name=\"usu_nome\" type=\"text\" value=\"$nome\"><br>
                    E-mail: <input name=\"usu_email\" type=\"text\" value=\"$email\"><br>
                    Senha: <input name=\"usu_senha\" type=\"text\" value=\"$senha\"><br>
               
                        <div class=\"labelsBusca\">
                <input name=\"botao\" type=\"submit\" value=\"Modificar\">
            </div>
            </form>
        </div>
        ";
        }
    } else $sql = "Select * from usuarios order by usu_nome";


    ?>
    <!-- CDN Javascript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>