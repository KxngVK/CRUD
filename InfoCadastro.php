<?php 
    global $pdo;
    require_once("conexao.php");
    require_once ("User.php");
     
    $usuario = new Usuarios($pdo);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Sanitiza e obtém os dados do formulário
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
      
        $cadastro = $usuario->inserir ($nome, $email, $senha);
    
        echo "<p>Usuário cadastrado com sucesso!</p>";
    }else{
        echo "Algo errado ao cadastrar";
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso ou erro</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        p {
            font-size: 20px;
            text-align: center;
            margin-bottom: 30px;
        }

        button {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <p>
    <button onclick="javascript:window.location.href='index.php'">Voltar para lista</button>
    </p>
</body>
</html>

   