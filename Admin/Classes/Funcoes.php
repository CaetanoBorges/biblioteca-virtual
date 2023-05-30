<?php

class Funcoes{

    public static $conexao = null;

    static function conexao()
	{
		
		if(isset(self::$conexao)){
			return self::$conexao;
		}

		self::$conexao = new \PDO("mysql:host=localhost;dbname=biblioteca", "root", "");
		return self::$conexao;

	}

    static function fazHash($valor){
        return hash("sha512",$valor);
    }

    static function quando($quando){
        date_default_timezone_set("Africa/Luanda");
        return date("d-m-Y H:i:s A",$quando);
    }

    static function chaveDB(){
        return uniqid();
    }

    static function seisDigitos($length = 4){
        $characters = (string) mt_rand(100000,999999);
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    static function generateRandomString($length = 4) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    static function identificador(){
        return  self::generateRandomString()."-".self::seisDigitos();
    }

    static function enviaEmail($mail, $email, $titulo, $corpo, $confPath = "email.conf.json"){
        $conf = file_get_contents($confPath);

        $configuracao = (array) json_decode($conf);
        
        // Passing `true` enables exceptions
        //Server settings
        $mail->SMTPDebug = 0;           // Enable verbose debug output
        $mail->isSMTP();  // Set mailer to use SMTP
        $mail->Host = $configuracao['servidor'];  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;   // Enable SMTP authentication
        $mail->Username = $configuracao['usuario'];         // SMTP username
        $mail->Password = $configuracao['palavra_passe'];           // SMTP password
        $mail->SMTPSecure = $configuracao['seguranca'];// Enable TLS encryption, `ssl` also accepted
        $mail->Port = $configuracao['porta'];// TCP port to connect to

        //Recipients
        $mail->setFrom($configuracao['usuario'], $configuracao['nome']);
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress($email);   // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);          // Set email format to HTML
        $mail->Subject = utf8_decode($titulo);
        $mail->Body    = $corpo;
        $mail->AltBody = $corpo;

        
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}