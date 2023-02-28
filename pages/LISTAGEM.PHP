<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
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
    <?php
    error_reporting(0);
    $id = mysqli_connect("localhost", "root", "");
    $con = mysqli_select_db($id, "aula3");

    if (isset($_POST['usu_cod'])) {
        $cod =  $_POST['usu_cod'];
        $sql = "select * from usuarios where usu_cod = $cod";
    } else {
        $sql = "select * from usuarios order by usu_nome";
    }
    $result = mysqli_query($id, $sql);

    while ($obj = mysqli_fetch_array($result)) {
        $cod = $obj[0];
        $nome = $obj[1];
        $email = $obj[2];
        $senha = $obj[3];
        echo " 
        <form id=\"form\" name=\"formulario\" method=\"post\" action=\"excluir.php\">
            <div>
                Codigo: <input name=\"cod\" type=\"text\" value=\"$cod\"><br>
            </div>
            <div>
                Nome: <input name=\"nome\" type=\"text\" value=\"$nome\"><br>
            </div>
            <div>
                E-mail: <input name=\"email\" type=\"text\" value=\"$email\"><br>
            </div>
            <div>
                Senha: <input name=\"senha\" type=\"text\" value=\"$senha\"><br>
            </div>
            <div>
            <input type=\"button\" value=\"Excluir\" onclick=\"submitForm('excluir')\" />
            </div>
            <div>
            <input type=\"button\" value=\"Alterar\" onclick=\"submitForm('editar')\" />
            </div>

            <div class='botao'>
                <a href='busca.php'> 
                    <span class='material-icons'>arrow_back</span>
                </a>
           </div>
        </form>
        ";
    }
    ?>

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
        }

        form {
            flex-direction: column;
            align-items: center;
            display: block;
            margin: 0 auto 20px;
            position: relative;
            z-index: 1;
            background-color: #FFF5C0;

        }

        form div {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;

        }

        input {
            text-align: center;
            border: none;
            border-radius: 2%;
        }

        input[type=button] {
            margin: 1rem;
        }

        a {
            width: 100px;
            height: 50px;
            text-decoration: none;
            border-radius: 15px;
            display: grid;
            place-items: center;
            font-family: sans-serif;
            font-weight: bold;
        }

        a:active {
            border-style: inset;
        }
    </style>

    <script>
        function submitForm(operation) {
            const form = document.getElementById("form");

            if (operation == "excluir") {
                form.action = "excluir.php";
            } else if (operation == "editar") {
                form.action = "alterar.php";
            }
            form.submit();
        }
    </script>
</body>

</html>