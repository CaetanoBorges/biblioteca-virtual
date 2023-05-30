<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-admin'])) {
    # mostra a pagina
     
    if(isset($_GET["tipo"]) AND $_GET["tipo"] == "nome"){
        include("Classes/Funcoes.php");
        include("Classes/Categoria.php");
        $categoria = new Categoria(Funcoes::conexao());
        $categoria->alterarNome($_GET["id"], $_GET["nome"]);
        header("Location: categoria.php?q=".$_GET["id"]);
        return;
    }
    
    # mostra a pagina
    include("Classes/Funcoes.php");
    include("Classes/Video.php");
    include("Classes/Livro.php");
    include("Classes/Categoria.php");

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
    <link rel="stylesheet" href="_arq/bootstrap/css/bootstrap.min.css">
    <script src="_arq/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="_arq/one.css">
    <title>Home</title>
</head>
<body>
    <style>
        .fecha-modal{width:20px;height:20px;border-radius:50%;background-color:#D07746;border:none;position:absolute;top:10px;right:10px;}
    </style>
    <div class="corpo">
        <?php include("_partes/top.php"); ?>

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
            <label for="exampleInputEmail1" >Nome</label>
            <input type="text" class="form-control" value="<?php echo $Categoria['nome'] ?>" disabled>
        </div>
        <div class="form-group" style="width:25%;float:right;">
            <label for="exampleInputEmail1" >&nbsp;</label>
            <div class="rv-btn" style="margin:0;padding:3%;text-align:center;cursor:pointer;"  data-bs-toggle="modal" data-bs-target="#nomemodal">
                MUDAR NOME
            </div>
            <!-- Modal -->
            <div class="modal fade" id="nomemodal" tabindex="-1" aria-labelledby="nomemodalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-sm">
                            
                                <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                                
                            <div class="modal-body">
                                <form style="width:70%;display:block;margin:0 auto;">
                                    <div class="form-group">
                                        <label for="exampleInputTitulo">Nome da categoria</label>
                                        <input type="hidden" class="form-control" value="<?php echo $Categoria['id'] ?>" name="id" >
                                        <input type="hidden" class="form-control" value="nome" name="tipo" >
                                        <input type="text" class="form-control" value="<?php echo $Categoria['nome'] ?>" name="nome" required>
                                    </div><br>
                                    
                                    <button type="submit" class="btn btn-primary rv-btn-submit">MUDAR NOME</button>
                                </form>
                            </div>
                        <br><br><br>
                        </div>
                    </div>
                </div>
            <!-- FIM MODAL -->
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

    <?php include("_partes/pes.php"); ?>

</body>
</html>
<?php 

}
?>