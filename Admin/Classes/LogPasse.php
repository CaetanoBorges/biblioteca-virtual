<?php
class LogPasse{


    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }


    public function get(string $email) : array{
        
        $query=$this->conn->prepare("SELECT * FROM log_passe WHERE quem = ?");
        $query->bindValue(1, $email);
        $query->execute();
        
        $res = $query->fetchAll();
        rsort($res);
        return $res;
    }


    public function adicionar(string $quem, string $momento, string $passe) : bool {

        $query=$this->conn->prepare("INSERT INTO log_passe (quem, momento, passe) VALUES (?, ?, ?)");
        $query->bindValue(1, $quem);
        $query->bindValue(2, $momento);
        $query->bindValue(3, $passe);
        $query->execute();

        return true;
    }
    

}