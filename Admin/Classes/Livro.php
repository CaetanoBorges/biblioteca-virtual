<?php
class Livro{
    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }

    public function pesquisar(string $p) : array{
        
        $query=$this->conn->prepare('SELECT * FROM livro WHERE categoria LIKE "%'.$p.'%" OR titulo LIKE "%'.$p.'%" OR autor LIKE "%'.$p.'%" OR descricao LIKE "%'.$p.'%" OR capa LIKE "%'.$p.'%" OR pdf LIKE "%'.$p.'%"  ');
        $query->execute();
        return $query->fetchAll();
    }

    public function adicionar(int $categoria, string $titulo, string $autor, string $descricao, int $quando, string $capa, string $pdf) : bool {
        $query=$this->conn->prepare("INSERT INTO livro (categoria, titulo, autor, descricao, quando, capa, pdf, acesso) VALUES (?, ?, ? ,? ,? ,? ,? ,?)");
        $query->bindValue(1, $categoria);
        $query->bindValue(2, $titulo);
        $query->bindValue(3, $autor);
        $query->bindValue(4, $descricao);
        $query->bindValue(5, $quando);
        $query->bindValue(6, $capa);
        $query->bindValue(7, $pdf);
        $query->bindValue(8, 0);
        $query->execute();

        return true;
    }
    
    public function get(int $id) : array{
        
        $query=$this->conn->prepare("SELECT * FROM livro WHERE id = ?");
        $query->bindValue(1, $id);
        $query->execute();
        return $query->fetch();
    }
    
    public function getAll() : array{
        
        $query=$this->conn->prepare("SELECT * FROM livro");
        $query->execute();
        return $query->fetchAll();
    }
    public function getAllByCategory(string $categoria) : array{
        
        $query=$this->conn->prepare("SELECT * FROM livro WHERE categoria = ?");
        $query->bindValue(1,$categoria);
        $query->execute();

        return $query->fetchAll();
    }
    public function alterarDetalhes(int $id, int $categoria, string $titulo, string $autor, string $descricao) : array {
        $query=$this->conn->prepare("UPDATE livro SET categoria = ?, titulo = ?, autor = ?, descricao = ? WHERE id = ? ");
        $query->bindValue(1, $categoria);
        $query->bindValue(2, $titulo);
        $query->bindValue(3, $autor);
        $query->bindValue(4, $descricao);
        $query->bindValue(5, $id);
        $query->execute();

        return $this->get($id);
    }
    
    public function alterarPdf(int $id, string $pdf) : array {
        $query=$this->conn->prepare("UPDATE livro SET pdf = ? WHERE id = ? ");
        $query->bindValue(1, $pdf);
        $query->bindValue(2, $id);
        $query->execute();

        return $this->get($id);
    }

    public function alterarCapa(int $id, string $capa) : array {
        $query=$this->conn->prepare("UPDATE livro SET capa = ? WHERE id = ? ");
        $query->bindValue(1, $capa);
        $query->bindValue(2, $id);
        $query->execute();

        return $this->get($id);
    }

}