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
    <title>Acessos</title>
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
        <br><br><br>
        <div class="home-buttons"> 
            
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo $acesso->getLivro() ?>
                    </div>
                    <div class="grande bg-gray">
                        LIVROS
                    </div>
                </div>
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo $acesso->getAudio() ?>
                    </div>
                    <div class="grande bg-gray">
                        AUDIOBOOKS
                    </div>
                </div>
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo $acesso->getVideo() ?>
                    </div>
                    <div class="grande bg-gray">
                        VIDEOAULAS
                    </div>
                </div>
        </div>

        
        <div class="home-images" style="margin-top: -8px;"> 
           <?php
            $tot = 0;
            $query=Funcoes::conexao()->prepare("SELECT ano FROM acessos GROUP BY ano");
            $query->execute();
            $anos = $query->fetchAll();
            rsort($anos);
            foreach($anos as $k => $ano){          
            $dado = $acesso-> visitas($ano['ano']);
            $anual = $acesso-> visitas_ano($ano['ano']);
            $tot += $anual;
            rsort($dado);
            $qtds = count($dado);
            echo  '<p style="padding:3%;font-weight:bold;background:#780000;color:white;margin-bottom:3px;cursor:pointer;"  data-bs-toggle="collapse" data-bs-target="#collapseExample'.($qtds - $k).'" aria-expanded="false" aria-controls="collapseExample'.($qtds - $k).'" >'. $ano["ano"].' <h style="float:right;">'.number_format($anual,0 ,".",".").' visitas</h></p>';
            echo '<div  class="collapse" id="collapseExample'.($qtds - $k).'">';
            foreach($dado as $d){
            ?>
                <p data-toggle="collapse" data-target="#collapseExample<?php echo $d['mes']."-".$ano['ano'] ?>" style="margin-bottom:1.5px;color:#fff;background:#0099ff;padding:3%;margin-top:1.5px;padding:3%;"> <?php echo $d['mes'].'<h style="float:right;">'.number_format(floor($d['acesso']),0 ,".",".").' visitas</h>'; ?></p>
            <?php 
               
            }
                $vis = number_format($tot,0 ,".",".");
                echo  ' </div>';
            }
        ?>
        </div>

        <br><br><br><br><br><br><br><br>
        <div style="width:48%;display:inline-block;"> 
            <div class="btn-principal">
                <div class="pequena bg-blu">
                    <?php echo $acesso->acessosParciais() ?>
                </div>
                <div class="grande bg-gray">
                    ACESSOS
                </div>
            </div>
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
 }
?>