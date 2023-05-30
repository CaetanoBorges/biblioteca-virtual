<?php
error_reporting(1);


include("../Funcoes.php");
include("../Administrador.php");
include("../LogSessao.php");
if(isset($_POST['email']) and isset($_POST['passe'])){


    $email = $_POST['email'];

    $passe = Funcoes::fazHash($_POST['passe']);
    
    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $administrador = new Administrador($conexao);

    $res = $administrador->login($email, $passe, $LogSessao);
    
    if($res){
        
        $metadata = $administrador->getByEmail($email);
        
        session_start();
        $_SESSION['bibliotecavirtual-admin'] = true;
        $_SESSION['metadata'] = $metadata;
        header('Location: ../../index.php');

    }else{
        header('Location: ../../index.php?erro=1');
    }


}
