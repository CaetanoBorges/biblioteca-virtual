<?php

include("../Funcoes.php");
include("../Usuario.php");
include("../LogPasse.php");
include("../LogSessao.php");


if(isset($_POST['email']) and isset($_POST['nome']) and isset($_POST['passe'])){


    $identificador = Funcoes::identificador();
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $passe = $_POST['passe'];
    $id_admin = $_POST['id_admin'];

    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $Usuario = new Usuario($conexao);

 
    if(true){
        
        $hashPasse = Funcoes::fazHash($passe);

        $res = $Usuario->adicionar($identificador, $nome, $nascimento, $telefone, $email, $hashPasse);
       
        $LogSessao->adicionar($id_admin, "Adicionou usuário ".$identificador, time());
        header('Location: ../../index.php');

    }


}
