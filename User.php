<?php 

require_once("conexao.php");

class Usuarios {
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

  
    public function listarTodos () {
      
        $sql = "SELECT * from usuarios"; 
        
       
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
    public function inserir ($nome, $email, $senha) {
      
        $sql = "INSERT INTO usuarios (id, nome, email, senha) VALUES (NULL, :nome, :email, :senha)";
        

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);

        $sha1 = sha1($senha); //sha1 para a senha
        $stmt->bindParam(':senha', $sha1);

        $stmt->execute(); //executando

        return $this->pdo->lastInsertId();
    }


    public function atualizar ($id, $nome, $email, $senha) {
        //Comando sql
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";  
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        
        $sha1 = sha1($senha); //sha1 para a senha
        $stmt->bindParam(':senha', $sha1);
        
        $stmt->execute(); //executando

        return $stmt->rowCount();
    }


    public function excluir ($id) {
    
        $sql = "DELETE from usuarios WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }
}