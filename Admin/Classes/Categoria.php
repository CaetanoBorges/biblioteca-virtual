<?php
class Categoria{
    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }

    public function pesquisar(string $p) : array{
        
        $query=$this->conn->prepare('SELECT * FROM categoria WHERE nome LIKE "%'.$p.'%"');
        $query->execute();
        return $query->fetchAll();
    }
    public function get(int $id) : array{
        
        $query=$this->conn->prepare("SELECT * FROM categoria WHERE id = ?");
        $query->bindValue(1, $id);
        $query->execute();
        return $query->fetch();
    }
    public function getAll() : array{
        
        $query=$this->conn->prepare("SELECT * FROM categoria");
        $query->execute();
        return $query->fetchAll();
    }

    public function alterarNome(int $id, string $nome) : array {
        $query=$this->conn->prepare("UPDATE categoria SET nome = ? WHERE id = ? ");
        $query->bindValue(1, $nome);
        $query->bindValue(2, $id);
        $query->execute();

        return $this->get($id);
    }
    
    public function adicionar(string $nome) : bool {
        $query=$this->conn->prepare("INSERT INTO categoria (nome) VALUES (?)");
        $query->bindValue(1, $nome);
        $query->execute();

        return true;
    }
    
}