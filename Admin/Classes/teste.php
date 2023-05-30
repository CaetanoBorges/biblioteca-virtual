<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


include("Funcoes.php");
include("Administrador.php");
include("LogPasse.php");

$conexao = Funcoes::conexao();

$logger = new LogPasse($conexao);

$obj = new Administrador($conexao);
$id = Funcoes::identificador();
//$pass = Funcoes::fazHash("!00antesdemimDeus");
#var_dump($obj->alterarDetalhes("NNSY-3835", "novo nome","novo nascimento", "98999999", "novo emial"));

$digitos = Funcoes::seisDigitos(6);
$obj->setCodigo("cbcaetanoborges@gmail.com", $digitos);
Funcoes::enviaEmail($mail,"cbcaetanoborges@gmail.com","Código de recuperação ".$digitos, "O seu número de verificação é: ".$digitos);

//var_dump($obj->verificaEmail("noboemail@ka.com"));

#var_dump($obj->alterarVideo(1,"Novo video"));