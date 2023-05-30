<?php

include("../Funcoes.php");
include("../Audio.php");
include("../LogPasse.php");
include("../LogSessao.php");



if(isset($_POST['id']) and isset($_POST['antigo'])){
   
    $identificador = Funcoes::identificador();

    
   
    $nomeAudio= time().$_FILES['audio']['name'];
    move_uploaded_file($_FILES['audio']['tmp_name'],"files/".$nomeAudio);
    unlink("files/".$_POST['antigo']);
    

    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $Audio = new Audio($conexao);

 
    if(true){
        $res = $Audio->alterarAudio( $_POST['id'], $nomeAudio);
        $LogSessao->adicionar($_POST['id_admin'], "Alterou o Audio ", time());
        echo json_encode($res);
    }

}
