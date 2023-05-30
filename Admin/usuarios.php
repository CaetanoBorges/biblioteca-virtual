<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-admin'])) {
	# mostra a pagina
    include("Classes/Funcoes.php");
    include("Classes/Usuario.php");

      
    $Usuario = new Usuario(Funcoes::conexao());
    $User = $Usuario->getAll();
            
	    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_arq/bootstrap/css/bootstrap.min.css">
    <script src="_arq/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="_arq/one.css">
    <title>USUARIOS</title>
</head>
<body>
    <style>
        
    </style>
    <div class="corpo">
        <?php include("_partes/top.php"); ?>

        <br><br><br><br><br><br><br><br>
        <a href="home.php" class="a-clean">
            <div class="btn-principal">
                <div class="pequena bg-red">
                    <?php echo  count($User); ?>
                </div>
                <div class="grande bg-gray">
                        USUÁRIOS
                </div>
            </div>
        </a>

        <br><br><br><br><br>
        <?php
            foreach($User as $res){ ?>
                <a href="usuario.php?q=<?php echo $res['identificador'] ?>" class="a-clean">
                    <div class="btn-principal" style="height:30px">
                        <div class="pequena bg-red" style="width: 10%;">
                            &nbsp;
                        </div>
                        <div class="grande bg-gray" style="width: 90%;">
                            <?php echo $res['nome'] ?>
                        </div>
                    </div>
                </a>
                <br>
           <?php }
        ?>







        <br><br><br><br><br><br><br><br>
    </div>

    <?php include("_partes/pes.php"); ?>

</body>
</html>
<?php 

}
?>