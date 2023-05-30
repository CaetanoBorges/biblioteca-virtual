<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


include("../Funcoes.php");
include("../Administrador.php");
include("../LogPasse.php");
include("../LogSessao.php");

$erro = false;
$email = "";
$codigo = "";
if(isset($_POST['email']) and isset($_POST['codigo']) and isset($_POST['passe'])){

    $email = $_POST['email'];
    $codigo = $_POST['codigo'];

    $passe = $_POST['passe'];

    $conexao = Funcoes::conexao(); 
    $LogSessao = new LogSessao($conexao);
    $administrador = new Administrador($conexao);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    if($administrador->verificaCodigo($email, $codigo)){
        
        $hashPasse = Funcoes::fazHash($passe);

        $administrador->alterarPasse($email, $hashPasse, new LogPasse($conexao));
        $administrador->setCodigo($email, "");

        $metadata = $administrador->getByEmail($email);
        
        $LogSessao->adicionar($metadata['id'], "Renovou palavra-passe", time());
        session_start();
        $_SESSION['bibliotecavirtual-admin'] = true;
        $_SESSION['metadata'] = $metadata;
        $LogSessao->adicionar($metadata['id'], "Iniciou sessão", time());
        header('Location: ../../index.php');

    }else{
        header('Location: ../../verificar_codigo.php?erro=1');
    }


}
