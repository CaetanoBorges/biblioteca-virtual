<?php

include("../Funcoes.php");
include("../Audio.php");
include("../LogPasse.php");
include("../LogSessao.php");

//var_dump($_POST);

if(isset($_POST['titulo']) and isset($_POST['autor']) and isset($_POST['categoria'])){
   
    $identificador = Funcoes::identificador();
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $autor = $_POST['autor'];
    $descricao = $_POST['descricao'];
    $id_admin = $_POST['id_admin'];

    
   
    $nomeAudio= time().$_FILES['audio']['name'];
    move_uploaded_file($_FILES['audio']['tmp_name'],"files/".$nomeAudio);

    

    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $Audio = new Audio($conexao);

 
    if(true){
        

        $res = $Audio->adicionar($categoria,  $titulo,  $autor,  $descricao,  time(), $nomeAudio);

        $LogSessao->adicionar($id_admin, "Adicionou Audio ".$titulo, time());
        
        echo $res;

    }


}
