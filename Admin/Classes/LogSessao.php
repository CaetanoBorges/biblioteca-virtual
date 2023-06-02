<?php
class LogSessao{


    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }


    public function get(string $id) : array{
        
        $query=$this->conn->prepare("SELECT * FROM log_sessao WHERE quem = ?");
        $query->bindValue(1, $id);
        $query->execute();
        
        $res = $query->fetchAll();
        rsort($res);
        return $res;
    }


    public function adicionar(string $quem, string $acao, string $momento) : bool {

        $query=$this->conn->prepare("INSERT INTO log_sessao (quem, acao, momento) VALUES (?, ?, ?)");
        $query->bindValue(1, $quem);
        $query->bindValue(2, $acao);
        $query->bindValue(3, $momento);
        $query->execute();

        return true;
    }
    

}