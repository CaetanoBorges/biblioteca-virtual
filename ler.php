<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-user'])) {
    function quando($quando){
        date_default_timezone_set("Africa/Luanda");
        return date("d-m-Y H:i:s A",$quando);
    }

	
	# mostra a pagina
    include("Admin/Classes/Funcoes.php");
    include("Admin/Classes/Livro.php");
    include("Admin/Classes/Categoria.php");

    include("Admin/Classes/Acessos.php");
    $acesso = new Acessos(Funcoes::conexao());
    $acesso->setLivro($_GET["q"]);

    $Livro = new Livro(Funcoes::conexao());
    $livro = $Livro->get($_GET["q"]);

    $Cat = new Categoria(Funcoes::conexao());
    $Categoria = $Cat->get($livro["categoria"]);

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
    <title><?php echo $livro['titulo'] ?></title>
</head>
<body>
    <style>
        .fecha-modal{width:20px;height:20px;border-radius:50%;background-color:#D07746;border:none;position:absolute;top:10px;right:10px;}
    </style>
    <div class="corpo">
        

        <div style="width:100%;display:block;"> 

               <style>
                .rv-btn {width:100%;display:block;background:#d9d9d9;height:30;margin: 10px 0;border:none;padding:2%}
                #pdf{position:fixed;width:100%;height:100vh;top:0;left:0;}
                #fechaOutrasOpcoes{position:fixed;width:100%;height:100vh;top:0;left:0;}
               </style>
            
                <!--<object data="Admin/Classes/Livro/files/<?php echo $livro['pdf'] ?>" type="application/pdf" id="pdf">-->
                <br>
              <iframe src = "ViewerJS/#../Admin/Classes/Livro/arquivo/<?php echo $livro['pdf'] ?>" id="pdf" allowfullscreen webkitallowfullscreen ></iframe>

            
        </div>
      

        


        </div>

        <br><br><br><br><br><br><br><br>
        
        <br><br><br><br><br><br><br><br>
    </div>
    <script>
        var pdf="";
        setTimeout(function(){
            pdf = document.querySelector("#pdf").contentDocument.querySelector("#control");
            /*pdf.onscroll = function(){
                
                console.log();
            }*/
        },2000);

    </script>
</body>
</html>
<?php 

}
?>