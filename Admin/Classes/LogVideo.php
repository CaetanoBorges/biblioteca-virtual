<?php
class LogVideo{


    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }


    public function get(string $id) : array{
        
        $query=$this->conn->prepare("SELECT * FROM log_video WHERE quem = ?");
        $query->bindValue(1, $id);
        $query->execute();
        
        $res = $query->fetchAll();
        rsort($res);
        return $res;
    }


    public function adicionar(string $video, string $usuario, string $pagina , int $quando) : bool {

        $query=$this->conn->prepare("INSERT INTO log_video (video, quem, pagina, quando) VALUES (?, ?, ?, ?)");
        $query->bindValue(1, $video);
        $query->bindValue(2, $usuario);
        $query->bindValue(3, $pagina);
        $query->bindValue(4, $quando);
        $query->execute();

        return true;
    }
    

}