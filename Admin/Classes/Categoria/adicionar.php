<?php

include("../Funcoes.php");
include("../Categoria.php");
include("../LogPasse.php");
include("../LogSessao.php");


if(isset($_POST['nome'])){


    $nome = $_POST['nome'];
    $id_admin = $_POST['id_admin'];

    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $Categoria = new Categoria($conexao);

 
    if(true){
        
        $res = $Categoria->adicionar($nome);
       
        $LogSessao->adicionar($id_admin, "Adicionou categoria ".$nome, time());
        header('Location: ../../index.php');

    }


}
