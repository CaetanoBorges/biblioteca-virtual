<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-user'])) {
	# mostra a pagina
    function quando($quando){
        date_default_timezone_set("Africa/Luanda");
        return date("d-m-Y H:i:s A",$quando);
    }

	
	# mostra a pagina
    include("Admin/Classes/Funcoes.php");
    include("Admin/Classes/Audio.php");
    include("Admin/Classes/Categoria.php");

    include("Admin/Classes/Acessos.php");
    $acesso = new Acessos(Funcoes::conexao());
    $acesso->setAudio($_GET["q"]);

    $Audio = new Audio(Funcoes::conexao());
    $audio = $Audio->get($_GET["q"]);

    $Cat = new Categoria(Funcoes::conexao());
    $Categoria = $Cat->get($audio["categoria"]);

    include("Admin/Classes/LogAudio.php");
    $log = new LogAudio(Funcoes::conexao());
    $log->adicionar($_GET["q"],($_SESSION['user']['metadados'][0]),"0",time());
	    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin/_arq/bootstrap/css/bootstrap.min.css">
    <script src="Admin/_arq/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Admin/_arq/one.css">
    <title><?php echo $audio['titulo'] ?></title>
</head>
<body>
    <style>
        .fecha-modal{width:20px;height:20px;border-radius:50%;background-color:#D07746;border:none;position:absolute;top:10px;right:10px;}
    </style><img src="Admin/_assets/back.jpg" class="background">
    <div class="corpo">
        <?php include("Admin/_partes/top.php"); ?>

        <br><br><br><br><br><br><br>
         <div class="btn-principal">
            <div class="pequena bg-red">
                        &nbsp;
            </div>
            <div class="grande bg-gray">
                    <?php echo $audio['titulo'] ?>
            </div>
        </div>
        <br><br><br>
        <audio src="Admin/Classes/Audio/arquivo/<?php echo $audio["audio"]?>" style="width:100%;display:block;" controls></audio>
        <div class="caption">
            <p class="info">Data</p>
            <p class="detail"><?php echo quando($audio['quando']) ?></p>
            <p class="info">Autor</p>
            <p class="detail"><?php echo $audio['autor'] ?></p>
            <p class="info">Categoria</p>
            <p class="detail"><?php echo $Categoria["nome"] ?></p>
            <p class="info">Descricao</p>
            <p class="detail"><?php echo $audio['descricao'] ?></p>
        </div>

        <br><br><br><br><br><br><br><br>
        
        <br><br><br><br><br><br><br><br>
    </div>

    <?php include("Admin/_partes/pes.php"); ?>

<script>

</script>
</body>
</html>
<?php 

}
?>