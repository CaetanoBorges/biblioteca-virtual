<?php

include("../Funcoes.php");
include("../Video.php");
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

    
   
    $nomeVideo= time().$_FILES['video']['name'];
    move_uploaded_file($_FILES['video']['tmp_name'],"files/".$nomeVideo);

    

    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $Video = new Video($conexao);

 
    if(true){
        

        $res = $Video->adicionar( $categoria,  $titulo,  $autor,  $descricao,  time(), $nomeVideo);

        $LogSessao->adicionar($id_admin, "Adicionou Video ".$titulo, time());
        
        echo $res;

    }


}
