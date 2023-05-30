<?php

include("../Funcoes.php");
include("../Video.php");
include("../LogPasse.php");
include("../LogSessao.php");



if(isset($_POST['id']) and isset($_POST['antigo'])){
   
    $identificador = Funcoes::identificador();

    
   
    $nomeVideo= time().$_FILES['video']['name'];
    move_uploaded_file($_FILES['video']['tmp_name'],"files/".$nomeVideo);
    unlink("files/".$_POST['antigo']);
    

    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $Video = new Video($conexao);

 
    if(true){
        $res = $Video->alterarVideo( $_POST['id'], $nomeVideo);
        $LogSessao->adicionar($_POST['id_admin'], "Alterou o Video ", time());
        echo json_encode($res);
    }

}
