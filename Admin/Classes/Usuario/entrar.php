<?php
error_reporting(1);

include("../Funcoes.php");
include("../Usuario.php");
include("../LogSessao.php");
if(isset($_POST['email']) and isset($_POST['passe'])){


    $email = $_POST['email'];

    $passe = Funcoes::fazHash($_POST['passe']);
    
    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $Usuario = new Usuario($conexao);

    $res = $Usuario->login($email, $passe, $LogSessao);
    
    if($res){
        
        $metadata = $Usuario->getByEmail($email);
        
        session_start();
        $_SESSION['bibliotecavirtual-user'] = true;
        $_SESSION["user"]['metadados'] = $metadata;
        header('Location: ../../../index.php');

    }else{
        header('Location: ../../../index.php?erro=1');
    }


}
