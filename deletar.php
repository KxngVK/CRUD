<?php 
    global $pdo;
    require_once ("conexao.php");
    require_once ("User.php");

    $usuario = new Usuarios($pdo);

    $id = $_GET['id'];

    $delete = $usuario->excluir($id);
    
    if ($delete) {
        header('Location: index.php');
        exit();
    } else {
        echo "Erro ao excluir o usuário.";
    }


   