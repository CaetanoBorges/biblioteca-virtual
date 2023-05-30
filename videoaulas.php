<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-user'])) {
	# mostra a pagina
    include("Admin/Classes/Funcoes.php");
    include("Admin/Classes/Video.php");

      
    $Video = new Video(Funcoes::conexao());
    $Vid = $Video->getAll();
            
           
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
    <title>Video aulas</title>
</head>
<body>
    <style>
        
    </style><img src="Admin/_assets/back.jpg" class="background">
    <div class="corpo">
        <?php include("Admin/_partes/top.php"); ?>

        <br><br><br><br><br><br><br><br>
        <a href="home.php" class="a-clean">
            <div class="btn-principal">
                <div class="pequena bg-red">
                    <?php echo count($Vid) ?>
                </div>
                <div class="grande bg-gray">
                    VIDEOAULAS
                </div>
            </div>
        </a>

        <br><br><br><br><br>
        <?php
            foreach($Vid as $res){ ?>
                <a href="videoaula.php?q=<?php echo $res['id'] ?>" class="a-clean">
                    <div class="btn-principal" style="height:30px">
                        <div class="pequena bg-red" style="width: 10%;">
                            &nbsp;
                        </div>
                        <div class="grande bg-gray" style="width: 90%;">
                            <?php echo $res['titulo'] ?>
                        </div>
                    </div>
                </a>
                <br>
           <?php }
        ?>
        
     
        <br>







        <br><br><br><br><br><br><br><br>
    </div>

    <?php include("Admin/_partes/pes.php"); ?>

</body>
</html>
<?php 

}
?>