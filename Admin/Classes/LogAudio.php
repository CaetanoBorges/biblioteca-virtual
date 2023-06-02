<?php
class LogAudio{


    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }


    public function get(string $id) : array{
        
        $query=$this->conn->prepare("SELECT * FROM log_audio WHERE quem = ?");
        $query->bindValue(1, $id);
        $query->execute();

        $res = $query->fetchAll();
        rsort($res);
        return $res;
    }


    public function adicionar(string $audio, string $usuario, string $pagina , int $quando) : bool {

        $query=$this->conn->prepare("INSERT INTO log_audio (audio, quem, pagina, quando) VALUES (?, ?, ?, ?)");
        $query->bindValue(1, $audio);
        $query->bindValue(2, $usuario);
        $query->bindValue(3, $pagina);
        $query->bindValue(4, $quando);
        $query->execute();

        return true;
    }
    

}