<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-admin'])) {
	# mostra a pagina
	    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="_assets/jquery.js"></script>
    <script src="_assets/lightslider.js"></script>
    <link rel="stylesheet" href="_assets/lightslider.css">
    <link rel="stylesheet" href="_arq/bootstrap/css/bootstrap.min.css">
    <script src="_arq/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="_arq/one.css">
    <title>Home</title>
</head>
<body>
    <?php 
            include("Classes/Funcoes.php");
            include("Classes/Categoria.php");
            include("Classes/Video.php");
            include("Classes/Livro.php");
            include("Classes/Audio.php");
            include("Classes/Usuario.php");
            include("Classes/Acessos.php");

            $acesso = new Acessos(Funcoes::conexao());
            
            $Categoria = new Categoria(Funcoes::conexao());
            $Cat = $Categoria->getAll();
            
            $Video = new Video(Funcoes::conexao());
            $Vid = $Video->getAll();
            
            $Livro = new Livro(Funcoes::conexao());
            $Liv = $Livro->getAll();

            $Audio = new Audio(Funcoes::conexao());
            $Aud = $Audio->getAll();
            
            $Usuario = new Usuario(Funcoes::conexao());
            $User = $Usuario->getAll();
            
        ?>
    <style>
        
    </style>
    <div class="corpo">
        <?php include("_partes/top.php"); ?>

        <br><br><br><br><br><br><br><br>
        <ul id="Slider"> 
                <li>
                    <img src="_assets/1.png" class="banner">
                </li>
                <li>
                    <img src="_assets/2.png" class="banner">
                </li>
                <li>
                    <img src="_assets/3.png" class="banner">
                </li>
            </ul>

        <?php include("_partes/pesquisar.php"); ?>

        <div class="home-buttons"> 
            <a href="usuarios.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($User);?>
                    </div>
                    <div class="grande bg-gray">
                        USUÁRIOS
                    </div>
                </div>
            </a>
            <a href="livros.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($Liv);?>
                    </div>
                    <div class="grande bg-gray">
                        LIVROS
                    </div>
                </div>
            </a>
            <a href="audiobooks.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($Aud);?>
                    </div>
                    <div class="grande bg-gray">
                        AUDIOBOOKS
                    </div>
                </div>
            </a>
            <a href="videoaulas.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($Vid);?>
                    </div>
                    <div class="grande bg-gray">
                        VIDEOAULAS
                    </div>
                </div>
            </a>
            <a href="categorias.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($Cat);?>
                    </div>
                    <div class="grande bg-gray">
                        CATEGORIAS
                    </div>
                </div>
            </a>
        </div>

        
        <div class="home-images"> 
            <a href="adicionar_usuario.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        ADICIONAR USUÁRIO
                    </div>
                </div>
            </a>
            <a href="adicionar_livro.php" class="a-clean">    
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        ADICIONAR LIVRO
                    </div>
                </div>
            </a>
            <a href="adicionar_audio.php" class="a-clean">    
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        ADICIONAR AUDIOBOOK
                    </div>
                </div>
            </a>
            <a href="adicionar_videoaula.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        ADICIONAR VIDEOAULA
                    </div>
                </div>
            </a>
            <a href="adicionar_categoria.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        ADICIONAR CATEGORIA
                    </div>
                </div>
            </a>
        </div>

        <br><br><br><br><br><br><br><br>
        <div style="width:48%;display:inline-block;"> 
            <a href="acessos.php" class="a-clean">
                <div class="btn-principal">
                    <div class="pequena bg-blu">
                        <?php echo $acesso->acessosParciais() ?>
                    </div>
                    <div class="grande bg-gray">
                        ACESSOS
                    </div>
                </div>
            </a>
        </div>
        
        <br><br><br><br><br><br><br><br>
    </div>

    <?php include("_partes/pes.php"); ?>

    <script type="text/javascript">
                $(document).ready(function() {
                    
                    $('#Slider').lightSlider({
                        gallery: false,
                        item: 1,
                        speed: 1200,
                        loop: true,
                        keyPress: true,
                        auto:true,
                        controls:true,
                        pager: false,
                        pauseOnHover: true,
                        pause:4000,
                        adaptiveHeight: true,
                        onSliderLoad: function() {
                            $('#Slider').removeClass('cS-hidden');
                        }
                    }).css("z-index","3");
                });
            </script>
</body>
</html>
<?php 
     }else{
 	    
         ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="_arq/bootstrap/css/bootstrap.min.css">
            <script src="_arq/bootstrap/js/bootstrap.min.js"></script>
            <script src="_assets/loader.js"></script>
            <link rel="stylesheet" href="_arq/one.css">
            <link rel="stylesheet" href="_arq/admin.css">
            <title>Home</title>
        </head>
        <body>
            <style>
                
            </style>
            <img src="_assets/back.png" class="background">
            <div class="corpo">
                <div class="centro">
                    <div class="inputs">
                        <form action="Classes/Administrador/entrar.php" method="post">
                            <input type="email" name="email" class="form-control" placeholder="Email" required> <br>
                            <input type="password" name="passe" class="form-control" placeholder="Palavra-passe" required>
                            <br>
                            <?php #echo hash("sha512","123456789"); ?>
                            <button type="submit" class="btn btn-md bg-lar center">ENTRAR</button><br>
                            <a href="receber_codigo.php" style="text-decoration:none;"> <p class="esqueci">Esqueci a Palavra-passe</p> </a>
                        </form>

                    </div>
                </div>
            </div>


        </body>
        
        </html>
        <?php 

 }
?>