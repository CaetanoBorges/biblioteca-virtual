<?php
class LogVideo{


    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }


    public function get(string $id) : array{
        
        $query=$this->conn->prepare("SELECT * FROM log_video WHERE usuario = ?");
        $query->bindValue(1, $id);
        $query->execute();
        return $query->fetchAll();
    }


    public function adicionar(string $video, string $usuario, string $pagina , string $quando) : bool {

        $query=$this->conn->prepare("INSERT INTO log_video (video, usuario, pagina, quando) VALUES (?, ?, ?, ?)");
        $query->bindValue(1, $video);
        $query->bindValue(2, $usuario);
        $query->bindValue(3, $pagina);
        $query->bindValue(5, $quando);
        $query->execute();

        return true;
    }
    

}