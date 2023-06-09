<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


include("../Funcoes.php");
include("../Administrador.php");
include("../LogPasse.php");

$erro = false;
$email = "";
$codigo = "";
if(isset($_POST['email']) and isset($_POST['codigo'])){

    $email = $_POST['email'];
    $codigo = $_POST['codigo'];

    $conexao = Funcoes::conexao();
    $administrador = new Administrador($conexao);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    if($administrador->verificaCodigo($email,$codigo)){
        
        header('Location: ../../nova_passe.php?email='.$email.'&codigo='.$codigo);

    }else{
        header('Location: ../../verificar_codigo.php?erro=1');
    }


}
