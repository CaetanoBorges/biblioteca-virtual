<?php

include("../Funcoes.php");
include("../Livro.php");
include("../LogPasse.php");
include("../LogSessao.php");


if(isset($_POST['titulo']) and isset($_POST['autor']) and isset($_POST['categoria'])){
   
    $identificador = Funcoes::identificador();
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $autor = $_POST['autor'];
    $descricao = $_POST['descricao'];
    $id_admin = $_POST['id_admin'];

    
    $nomeCapa= time().$_FILES['capa']['name'];
    move_uploaded_file($_FILES['capa']['tmp_name'],"files/".$nomeCapa);

    $nomePDF= time().$_FILES['pdf']['name'];
    move_uploaded_file($_FILES['pdf']['tmp_name'],"files/".$nomePDF);

    

    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $Livro = new Livro($conexao);

 
    if(true){
        

        $res = $Livro->adicionar( $categoria,  $titulo,  $autor,  $descricao,  time(),  $nomeCapa,  $nomePDF);
       
        $LogSessao->adicionar($id_admin, "Adicionou Livro ".$titulo, time());
        header('Location: ../../index.php');

    }


}
