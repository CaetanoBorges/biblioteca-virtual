<?php
class Video{
    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }

    public function pesquisar(string $p) : array{
        
        $query=$this->conn->prepare('SELECT * FROM video WHERE categoria LIKE "%'.$p.'%" OR titulo LIKE "%'.$p.'%" OR autor LIKE "%'.$p.'%" OR descricao LIKE "%'.$p.'%" OR video LIKE "%'.$p.'%" ');
        $query->execute();
        return $query->fetchAll();
    }

    public function adicionar(int $categoria, string $titulo, string $autor, string $descricao, int $quando,  string $video) : bool {
        $query=$this->conn->prepare("INSERT INTO video (categoria, titulo, autor, descricao, quando,  video, acesso) VALUES ( ?, ? ,? ,? ,? ,? ,?)");
        $query->bindValue(1, $categoria);
        $query->bindValue(2, $titulo);
        $query->bindValue(3, $autor);
        $query->bindValue(4, $descricao);
        $query->bindValue(5, $quando);
        $query->bindValue(6, $video);
        $query->bindValue(7, 0);
        $query->execute();

        return true;
    }
    
    public function get(int $id) : array{
        
        $query=$this->conn->prepare("SELECT * FROM video WHERE id = ?");
        $query->bindValue(1, $id);
        $query->execute();
        return $query->fetch();
    }
    
    public function getAll() : array{
        
        $query=$this->conn->prepare("SELECT * FROM video");
        $query->execute();
        return $query->fetchAll();
    }
    public function getAllByCategory(string $categoria) : array{
        
        $query=$this->conn->prepare("SELECT * FROM video WHERE categoria = ?");
        $query->bindValue(1,$categoria);
        $query->execute();

        return $query->fetchAll();
    }

    public function alterarDetalhes(int $id, int $categoria, string $titulo, string $autor, string $descricao) : array {
        $query=$this->conn->prepare("UPDATE video SET categoria = ?, titulo = ?, autor = ?, descricao = ? WHERE id = ? ");
        $query->bindValue(1, $categoria);
        $query->bindValue(2, $titulo);
        $query->bindValue(3, $autor);
        $query->bindValue(4, $descricao);
        $query->bindValue(5, $id);
        $query->execute();

        return $this->get($id);
    }
    
    public function alterarVideo(int $id, string $video) : array {
        $query=$this->conn->prepare("UPDATE video SET video = ? WHERE id = ? ");
        $query->bindValue(1, $video);
        $query->bindValue(2, $id);
        $query->execute();

        return $this->get($id);
    }

    public function alterarCapa(int $id, string $capa) : array {
        $query=$this->conn->prepare("UPDATE video SET capa = ? WHERE id = ? ");
        $query->bindValue(1, $capa);
        $query->bindValue(2, $id);
        $query->execute();

        return $this->get($id);
    }

}