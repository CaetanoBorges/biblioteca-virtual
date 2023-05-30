<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-user'])) {
    # mostra a pagina
    
    # mostra a pagina
    include("Admin/Classes/Funcoes.php");
    include("Admin/Classes/Video.php");
    include("Admin/Classes/Livro.php");
    include("Admin/Classes/Categoria.php");

    $Cat = new Categoria(Funcoes::conexao());
    $Categoria = $Cat->get($_GET['q']);

    $Vid = new Video(Funcoes::conexao());
    $videos = $Vid->getAllByCategory($Categoria['id']);

    $Liv = new Livro(Funcoes::conexao());
    $livros = $Liv->getAllByCategory($Categoria['id']);
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
    <title><?php echo $Categoria['nome'] ?></title>
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
                        <?php echo $Categoria['nome'] ?>
            </div>
        </div>
        <br><br><br>
        <div class="form-group" style="width:49%;display:inline-block;">
            <input type="text" class="form-control" value="<?php echo $Categoria['nome'] ?>" disabled>
        </div>
        
        <br><br><br><br>

        <div style="width:49%;display:inline-block;"> 
            
               <style>
                .rv-btn {width:100%;display:block;background:#d9d9d9;height:30;margin: 10px 0;border:none;padding:2%}
               </style>
                <!-- VIDEOAULA -->
                <a href="" class="a-clean" data-bs-toggle="collapse" data-bs-target="#videoCOLLAPSE">
                    <div class="btn-principal" style="margin:0;">
                        <div class="pequena bg-red">
                            <?php echo count($videos); ?>
                        </div>
                        <div class="grande bg-gray">
                            VÍDEOAULAS
                        </div>
                    </div>
                </a>
                <!-- COLLAPSE -->
                <div class="collapse fade bg-red" id="videoCOLLAPSE" tabindex="-1" aria-labelledby="videoCOLLAPSELabel" aria-hidden="true"> 
                    <ul style="padding:8% 0 8% 15%;">
                        <?php
                        foreach($videos as $res){ ?>
                            <a href="videoaula.php?q=<?php echo $res['id'] ?>" class="a-clean">
                                <span><?php echo $res['titulo'] ?></span>
                            </a>
                            <br>
                    <?php }
                    ?>
                        
                    </ul>
                </div>
                <!-- FIM COLLAPSE -->
                <!-- FIM VIDEOAULA -->
                
        </div>

        <div style="width:49%;float:right;"> 

            
            <!-- LIVROS -->
            <a href="" class="a-clean"  data-bs-toggle="collapse" data-bs-target="#livroCOLLAPSE">    
                <div class="btn-principal" style="margin:0;">
                    <div class="pequena bg-red">
                        <?php echo count($livros); ?>
                    </div>
                    <div class="grande bg-gray">
                        LIVROS
                    </div>
                </div>
            </a>
            <!-- COLLAPSE -->
            <div class="collapse fade bg-red" id="livroCOLLAPSE" tabindex="-1" aria-labelledby="livroCOLLAPSELabel" aria-hidden="true">
                <ul style="padding:8% 0 8% 15%;">
                    <?php
                        foreach($livros as $res){ ?>
                            <a href="livro.php?q=<?php echo $res['id'] ?>" class="a-clean">
                                <span><?php echo $res['titulo'] ?></span>
                            </a>
                            <br>
                    <?php }
                    ?>
                </ul>
            </div>
            <!-- FIM COLLAPSE -->
            <!-- FIM LIVROS -->

            

        </div>

        <br><br><br><br><br><br><br><br>
        
        <br><br><br><br><br><br><br><br>
    </div>

    <?php include("Admin/_partes/pes.php"); ?>

</body>
</html>
<?php 

}
?>