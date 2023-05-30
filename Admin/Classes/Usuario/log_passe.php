<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


include("../Funcoes.php");
include("../Usuario.php");
include("../LogSessao.php");

if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];


    $conexao = Funcoes::conexao();
    $LogSessao = new LogSessao($conexao);
    
    echo json_encode($LogSessao->get($usuario));


}
