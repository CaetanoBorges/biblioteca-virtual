<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-user'])) {
	# mostra a pagina
	    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Admin/_assets/jquery.js"></script>
    <script src="Admin/_assets/lightslider.js"></script>
    <link rel="stylesheet" href="Admin/_assets/lightslider.css">
    <link rel="stylesheet" href="Admin/_arq/bootstrap/css/bootstrap.min.css">
    <script src="Admin/_arq/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Admin/_arq/one.css">
    <title>Home</title>
</head>
<body>
    <?php 
            include("Admin/Classes/Funcoes.php");
            include("Admin/Classes/Categoria.php");
            include("Admin/Classes/Video.php");
            include("Admin/Classes/Audio.php");
            include("Admin/Classes/Livro.php");
            include("Admin/Classes/Usuario.php");
            include("Admin/Classes/Acessos.php");

            $Categoria = new Categoria(Funcoes::conexao());
            $Cat = $Categoria->getAll();
            
            $Video = new Video(Funcoes::conexao());
            $Vid = $Video->getAll();

            $Audio = new Audio(Funcoes::conexao());
            $Aud = $Audio->getAll();
            
            $Livro = new Livro(Funcoes::conexao());
            $Liv = $Livro->getAll();
            
            $Usuario = new Usuario(Funcoes::conexao());
            $User = $Usuario->getAll();


            $acesso = new Acessos(Funcoes::conexao());
            $acesso->registarAcesso();
            
        ?>
    <style>
        
    </style>
    <img src="Admin/_assets/back.jpg" class="background">
    <div class="corpo">
        <?php include("Admin/_partes/top.php"); ?>

        <br><br><br><br><br><br><br><br>
        <ul id="Slider">
                <li>
                    <img src="Admin/_assets/1.png" class="banner">
                </li>
                <li>
                    <img src="Admin/_assets/2.png" class="banner">
                </li>
                <li>
                    <img src="Admin/_assets/3.png" class="banner">
                </li>
            </ul>

        <?php include("Admin/_partes/pesquisar.php"); ?>

        <div class="home-buttons"> 
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

        
        <div class="home-images" style="margin-top: -10px ;"> 
            <ul id="lightSlider">
                <li>
                    <img src="Admin/_assets/4.png" style="width:100%;">
                </li>
                <li>
                    <img src="Admin/_assets/5.png" style="width:100%;">
                </li>
                <li>
                    <img src="Admin/_assets/6.png" style="width:100%;">
                </li>
            </ul>
        </div>

        <br><br><br><br><br><br><br><br>
        
        <br><br><br><br><br><br><br><br>
    </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#lightSlider').lightSlider({
                        gallery: false,
                        item: 1,
                        speed: 800,
                        loop: true,
                        keyPress: true,
                        auto:true,
                        controls:true,
                        pager: false,
                        pauseOnHover: true,
                        pause:3000,
                        adaptiveHeight: true,
                        onSliderLoad: function() {
                            $('#lightSlider').removeClass('cS-hidden');
                        }
                    }).css("z-index","3");
                    
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

    <?php include("Admin/_partes/pes.php"); ?>


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
            <link rel="stylesheet" href="Admin/_arq/bootstrap/css/bootstrap.min.css">
            <script src="Admin/_assets/jquery.js"></script>
            <script src="Admin/_assets/lightslider.js"></script>
            <link rel="stylesheet" href="Admin/_assets/lightslider.css">
            <script src="Admin/_arq/bootstrap/js/bootstrap.min.js"></script>
            <script src="Admin/_assets/loader.js"></script>
            <link rel="stylesheet" href="Admin/_arq/one.css">
            <link rel="stylesheet" href="Admin/_arq/admin.css">
            <title>Home</title>
        </head>
        <body>
            <style>
                .centro{margin:200px auto;width:700px;background:none;display:flex;align-items:center;justify-content:center}
                form{background: #fff ;padding:10px;border-radius:10px;width:300px;}
            </style>
            <img src="Admin/_assets/back.png" class="background">
            <div class="corpo">
                <div class="centro">

                    <ul id="lightSlider">
                        <li>
                            <img src="Admin/_assets/4.png" style="width:275px;border-radius:10px;">
                        </li>
                        <li>
                            <img src="Admin/_assets/5.png" style="width:275px;border-radius:10px;">
                        </li>
                        <li>
                            <img src="Admin/_assets/6.png" style="width:275px;border-radius:10px;">
                        </li>
                    </ul>

                    <div>
                        <form action="Admin/Classes/Usuario/entrar.php" method="post">
                            <input type="email" name="email" class="form-control" placeholder="Email" required> <br>
                            <input type="password" name="passe" class="form-control" placeholder="Palavra-passe" required>
                            <br>
                            <?php #echo hash("sha512","123456789"); ?>
                            <button type="submit" class="btn btn-md bg-lar center">ENTRAR</button><br>
                        </form>
                    </div>

                </div>

            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#lightSlider').lightSlider({
                        gallery: false,
                        item: 1,
                        speed: 800,
                        loop: true,
                        keyPress: true,
                        auto:true,
                        controls:true,
                        pager: false,
                        pauseOnHover: true,
                        pause:3000,
                        adaptiveHeight: true,
                        onSliderLoad: function() {
                            $('#lightSlider').removeClass('cS-hidden');
                        }
                    }).css("z-index","3");
                });
            </script>

        </body>
        
        </html>
        <?php 

 }
?>