<?php
class Acessos{
    protected $conn;
    function __construct(pdo $conn){
        $this->conn = $conn;
    }

    public function setAudio($id){
            
        $query=$this->conn->prepare("SELECT * FROM audio WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();
        $res = $query->fetch();

        $mais=$res['acesso'] + 1;
        $query=$this->conn->prepare("UPDATE audio SET acesso = ? WHERE id = ?");
        $query->bindValue(1,$mais);
        $query->bindValue(2,$id);
        $query->execute();  
    }
    public function getAudio() : string{
        
        $query=$this->conn->prepare('SELECT SUM(acesso) FROM audio');
        $query->execute();
        $res = $query->fetch();
        return $res["SUM(acesso)"];
    }


    public function setLivro($id){
            
        $query=$this->conn->prepare("SELECT * FROM livro WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();
        $res = $query->fetch();

        $mais=$res['acesso'] + 1;
        $query=$this->conn->prepare("UPDATE livro SET acesso = ? WHERE id = ?");
        $query->bindValue(1,$mais);
        $query->bindValue(2,$id);
        $query->execute();  
    }
    public function getLivro() : string{
        
        $query=$this->conn->prepare('SELECT SUM(acesso) FROM livro');
        $query->execute();
        $res = $query->fetch();
        return $res["SUM(acesso)"];
    }

    public function setVideo($id){
            
        $query=$this->conn->prepare("SELECT * FROM video WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();
        $res = $query->fetch();

        $mais=$res['acesso'] + 1;
        $query=$this->conn->prepare("UPDATE video SET acesso = ? WHERE id = ?");
        $query->bindValue(1,$mais);
        $query->bindValue(2,$id);
        $query->execute();  
    }
    public function getVideo() : string{
        
        $query=$this->conn->prepare('SELECT SUM(acesso) FROM video');
        $query->execute();
        $res = $query->fetch();
        return $res["SUM(acesso)"];
    }
 
    public function acessosParciais(): int{
        return $this->getAudio() + $this->getLivro() + $this->getVideo() + $this->getTotal();
    }


    public function getTotal() : string{
        
        $query=$this->conn->prepare('SELECT SUM(acesso) FROM acessos');
        $query->execute();
        $res = $query->fetch();
        return $res["SUM(acesso)"];
    }
    public function registarAcesso(){
            
            $dia=date('d');
            $mes=date('F');
            $ano=date('Y');
            $query=$this->conn->prepare("SELECT * FROM acessos WHERE dia = ? AND mes = ? AND ano = ? ");
            $query->bindValue(1,$dia);
            $query->bindValue(2,$mes);
            $query->bindValue(3,$ano);
            $query->execute();
            $res = $query->fetchAll();
            $qtd = count($res);

            if($qtd > 0 ){
                $mais=$res[0]['acesso'] + 1;
                $query=$this->conn->prepare("UPDATE acessos SET acesso = ? WHERE dia = ? AND mes = ? AND ano = ?");
                $query->bindValue(1,$mais);
                $query->bindValue(2,$dia);
                $query->bindValue(3,$mes);
                $query->bindValue(4,$ano);
                $query->execute();
            }else{
                $query=$this->conn->prepare("INSERT INTO acessos (acesso, dia, mes, ano) VALUES(?, ?, ?, ?)");
                $query->bindValue(1,'1');
                $query->bindValue(2,$dia);
                $query->bindValue(3,$mes);
                $query->bindValue(4,$ano);
                $query->execute();
            }
            
    }
}

?>