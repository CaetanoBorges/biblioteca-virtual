<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-admin'])) {
	# mostra a pagina

    $query = $_GET['query'];
    include("Classes/Funcoes.php");
    include("Classes/Categoria.php");
    include("Classes/Video.php");
    include("Classes/Audio.php");
    include("Classes/Livro.php");
    include("Classes/Usuario.php");

    $Categoria = new Categoria(Funcoes::conexao());
    $Cat = $Categoria->pesquisar($query);
      
    $Video = new Video(Funcoes::conexao());
    $Vid = $Video->pesquisar($query);

    $Audio = new Audio(Funcoes::conexao());
    $Aud = $Audio->pesquisar($query);
            
    $Livro = new Livro(Funcoes::conexao());
    $Liv = $Livro->pesquisar($query);

    $Usuario = new Usuario(Funcoes::conexao());
    $User = $Usuario->pesquisar($query);
            
            
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
    <title>Pesquisar</title>
</head>
<body>
    <style>
        .collapse-style{width:100%;padding:5%;}
        .a-res{width:100%;padding:1% 5%;display:block;margin-bottom:10px;}
    </style>
    <div class="corpo">
        <?php include("_partes/top.php"); ?>

        <br><br><br><br><br><br><br><br>

        <?php include("_partes/pesquisar.php"); ?>
            <p><span style="opacity:.4;">A mostrar resultados para: </span> <?php echo $query ?></p>
        <br>
        <div > 
                <div class="btn-principal" data-bs-toggle="collapse" data-bs-target="#usuarios" aria-controls="usuarios">
                    <div class="pequena bg-red">
                        <?php echo count($User); ?>
                    </div>
                    <div class="grande bg-gray">
                        USUÁRIOS
                    </div>
                </div>
                <div class="bg-red collapse collapse-style" id="usuarios">
                    <?php
                        foreach($User as $res){
                            echo '<a href="usuario.php?q='.$res['identificador'].'" class="a-clean bg-gray a-res">'.$res['nome'].'</a>';
                        }
                    ?>
                    
                </div>
                <br>
                <div class="btn-principal" data-bs-toggle="collapse" data-bs-target="#livros" aria-controls="livros">
                    <div class="pequena bg-red">
                        <?php echo count($Liv); ?>
                    </div>
                    <div class="grande bg-gray">
                        LIVROS
                    </div>
                </div>
                <div class="bg-red collapse collapse-style" id="livros">
                    
                    <?php
                        foreach($Liv as $res){
                            echo '<a href="livro.php?q='.$res['id'].'" class="a-clean bg-gray a-res">'.$res['titulo'].'</a>';
                        }
                    ?>
                </div>
                <br>
                <div class="btn-principal" data-bs-toggle="collapse" data-bs-target="#videoaulas" aria-controls="videoaulas">
                    <div class="pequena bg-red">
                        <?php echo count($Vid); ?>
                    </div>
                    <div class="grande bg-gray">
                        VIDEOAULAS
                    </div>
                </div>
                <div class="bg-red collapse collapse-style" id="videoaulas">
                    <?php
                        foreach($Vid as $res){
                            echo '<a href="video.php?q='.$res['id'].'" class="a-clean bg-gray a-res">'.$res['titulo'].'</a>';
                        }
                    ?>
                </div>
                <br>
                <div class="btn-principal" data-bs-toggle="collapse" data-bs-target="#audiobooks" aria-controls="audiobooks">
                    <div class="pequena bg-red">
                        <?php echo count($Aud); ?>
                    </div>
                    <div class="grande bg-gray">
                        AUDIOBOOKS
                    </div>
                </div>
                <div class="bg-red collapse collapse-style" id="audiobooks">
                    <?php
                        foreach($Aud as $res){
                            echo '<a href="audiobook.php?q='.$res['id'].'" class="a-clean bg-gray a-res">'.$res['titulo'].'</a>';
                        }
                    ?>
                </div>
                <br>
                <div class="btn-principal" data-bs-toggle="collapse" data-bs-target="#categorias" aria-controls="categorias">
                    <div class="pequena bg-red">
                        <?php echo count($Cat); ?>
                    </div>
                    <div class="grande bg-gray">
                        CATEGORIAS
                    </div>
                </div>
                <div class="bg-red collapse collapse-style" id="categorias">
                    
                    <?php
                        foreach($Cat as $res){
                            echo '<a href="categoria.php?q='.$res['id'].'" class="a-clean bg-gray a-res">'.$res['nome'].'</a>';
                        }
                    ?>
                </div>
        </div>

        
        
        <br><br><br><br><br><br><br><br>
    </div>

    <?php include("_partes/pes.php"); ?>

</body>
</html>
<?php 

}
?>