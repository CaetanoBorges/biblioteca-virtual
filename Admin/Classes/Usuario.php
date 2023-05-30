<?php
class Usuario{
    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }
    public function pesquisar(string $p) : array{
        
        $query=$this->conn->prepare('SELECT * FROM usuario WHERE identificador LIKE "%'.$p.'%" OR nome LIKE "%'.$p.'%" OR nascimento LIKE "%'.$p.'%" OR telefone LIKE "%'.$p.'%" OR email LIKE "%'.$p.'%" ');
        $query->execute();
        return $query->fetchAll();
    }
    public function login(string $email, string $passe, LogSessao $logger) : bool {

        
        $query=$this->conn->prepare("SELECT * FROM usuario WHERE email = ? AND passe = ?");
        $query->bindValue(1, $email);
        $query->bindValue(2, $passe);
        $query->execute();
        $res = $query->fetchAll();
        

        if(count($res) > 0){
            $id = $res[0]['identificador'];
            $logger->adicionar($id,"Iniciou sessão",time());
            return true;
        }
        return false;
    }
    public function adicionar(string $identificador, string $nome, string $nascimento, string $telefone, string $email, string $passe) : bool {
        $query=$this->conn->prepare("INSERT INTO usuario (identificador, nome, nascimento, telefone, email, passe) VALUES (?, ?, ? ,? ,? ,? )");
        $query->bindValue(1, $identificador);
        $query->bindValue(2, $nome);
        $query->bindValue(3, $nascimento);
        $query->bindValue(4, $telefone);
        $query->bindValue(5, $email);
        $query->bindValue(6, $passe);
        $query->execute();

        return true;
    }
    
    public function get(string $identificador) : array{
        
        $query=$this->conn->prepare("SELECT * FROM usuario WHERE identificador = ?");
        $query->bindValue(1, $identificador);
        $query->execute();

        return $query->fetch();
    }
    public function getByEmail(string $email) : array{
        
        $query=$this->conn->prepare("SELECT * FROM usuario WHERE email = ?");
        $query->bindValue(1, $email);
        $query->execute();
        return $query->fetch();
    }
    public function getAll() : array{
        
        $query=$this->conn->prepare("SELECT * FROM usuario");
        $query->execute();

        return $query->fetchAll();
    }
    
    public function alterarDetalhes(string $identificador, string $nome, string $nascimento, string $telefone, string $email) : array {
        $query=$this->conn->prepare("UPDATE usuario SET nome = ?, nascimento = ?, telefone = ?, email = ? WHERE identificador = ? ");
        $query->bindValue(1, $nome);
        $query->bindValue(2, $nascimento);
        $query->bindValue(3, $telefone);
        $query->bindValue(4, $email);
        $query->bindValue(5, $identificador);
        $query->execute();

        return $this->get($identificador);
    }

     public function getPasse(string $identificador) : string {
        $query=$this->conn->prepare("SELECT passe FROM usuario WHERE identificador = ?");
        $query->bindValue(1, $identificador);
        $query->execute();

        return $query->fetch()[0];
    }
    public function alterarPasse(string $identificador, string $passe, LogPasse $logger) : bool {

        $passeAntiga = self::getPasse($identificador);

        $query=$this->conn->prepare("UPDATE usuario SET passe = ? WHERE identificador = ? ");
        $query->bindValue(1, $passe);
        $query->bindValue(2, $identificador);
        $query->execute();

        $logger->adicionar($identificador,time(),$passeAntiga);

        return true;
    }

}