<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-admin'])) {
    function quando($quando){
        date_default_timezone_set("Africa/Luanda");
        return date("d-m-Y H:i:s A",$quando);
    }

	# mostra a pagina
   
    if(isset($_POST["tipo"]) AND $_POST["tipo"] == "pdf"){
        include("Classes/Funcoes.php");
        include("Classes/Livro.php");

        $pdf = time().$_FILES["pdf"]["name"];
        move_uploaded_file($_FILES["pdf"]["tmp_name"], "Classes/Livro/files/".$pdf);

        $livro = new Livro(Funcoes::conexao());
        $livro->alterarPdf($_POST["id"], $pdf);
        unlink("Classes/Livro/files/".$_POST["pdfatual"]);
        header("Location: livro.php?q=".$_POST["id"]);
        return;
    }
    if(isset($_POST["tipo"]) AND $_POST["tipo"] == "capa"){
        include("Classes/Funcoes.php");
        include("Classes/Livro.php");

        $capa = time().$_FILES["capa"]["name"];
        move_uploaded_file($_FILES["capa"]["tmp_name"], "Classes/Livro/files/".$capa);

        $livro = new Livro(Funcoes::conexao());
        $livro->alterarCapa($_POST["id"], $capa);
        unlink("Classes/Livro/files/".$_POST["capaatual"]);
        header("Location: livro.php?q=".$_POST["id"]);
        return;
    }
    
    if(isset($_GET["tipo"]) AND $_GET["tipo"] == "detalhes"){
        include("Classes/Funcoes.php");
        include("Classes/Livro.php");
        $livro = new Livro(Funcoes::conexao());
        $livro->alterarDetalhes($_GET["id"], $_GET["categoria"], $_GET["titulo"], $_GET["autor"], $_GET["descricao"]);
        header("Location: livro.php?q=".$_GET["id"]);
        return;
    }
    
	# mostra a pagina
    include("Classes/Funcoes.php");
    include("Classes/Livro.php");
    include("Classes/Categoria.php");

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
    <link rel="stylesheet" href="_arq/bootstrap/css/bootstrap.min.css">
    <script src="_arq/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="_arq/one.css">
    <title><?php echo $livro['titulo'] ?></title>
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
                    <?php echo $livro['titulo'] ?>
            </div>
        </div>
        <br><br><br><br><br><br><br>

        <div style="width:45%;display:inline-block;"> 
            
               <style>
                .rv-btn {width:100%;display:block;background:#d9d9d9;height:30;margin: 10px 0;border:none;padding:2%}
               </style>
            
                <div class="form-group">
                    <label for="exampleInputTitulo">Titulo</label>
                    <input type="text" class="form-control" value="<?php echo $livro['titulo'] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputCategoria">Categoria</label>
                    <input type="text" class="form-control"  value="<?php echo $Categoria["nome"] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputData">Data de publicação na biblioteca</label>
                    <input type="text" class="form-control"  value="<?php echo quando($livro['quando']) ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputAutor">Autor</label>
                    <input type="text" class="form-control"  value="<?php echo $livro['autor'] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputDescricao">Descrição</label>
                    <textarea type="text" class="form-control" id="exampleInputDescricao" disabled style="height:100px"> <?php echo $livro['descricao'] ?></textarea>
                </div>
                <br>
                <button class="rv-btn" type="button" data-bs-toggle="modal" data-bs-target="#dadosModal">EDITAR DADOS</button>
                <!-- Dados Modal -->
                <div class="modal fade" id="dadosModal" tabindex="-1" aria-labelledby="dadosModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-sm">
                            
                                <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                                
                            <div class="modal-body">
                                <form style="width:70%;display:block;margin:0 auto;" action="livro.php" method="get">
                                    <input type="hidden" value="<?php echo $livro['id'] ?>" name="id">
                                    <input type="hidden" value="detalhes" name="tipo">
                                    <div class="form-group">
                                        <label for="exampleInputTitulo">Titulo</label>
                                        <input type="text" class="form-control"  name="titulo" value="<?php echo $livro['titulo'] ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputCategoria">Categoria</label>
                                        <select name="categoria" class="form-control">
                                            <option value="<?php echo $Categoria["id"]; ?>"><?php echo $Categoria["nome"]; ?></option>
                                            <?php
                                                foreach($Cat->getAll() as $C){ ?>
                                                    <option value="<?php echo $C["id"]; ?>"><?php echo $C["nome"]; ?></option>
                                               <?php }
                                            ?>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputData">Data de publicação na biblioteca</label>
                                        <input type="text" class="form-control" value="<?php echo quando($livro['quando']) ?>" disabled>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputAutor">Autor</label>
                                        <input type="text" class="form-control" name="autor" value="<?php echo $livro['autor'] ?>"  required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputDescricao">Descrição</label>
                                        <textarea type="text" class="form-control"  name="descricao" required style="height:100px"> <?php echo $livro['descricao'] ?> </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary rv-btn-submit" >EDITAR DADOS</button>
                                </form>
                            </div>
                        <br><br><br>
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL -->

            
        </div>

        <!-- SESSOES -->
        <div style="width:35%;float:right;"> 
        <br>
        <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo $livro['acesso'] ?>
                    </div>
                    <div class="grande bg-gray">
                        ACESSOS
                    </div>
                </div>
                <br>
                <img src="Classes/Livro/files/<?php echo $livro['capa'] ?>" style="width:100%;display:block;">
                <a href="" class="a-clean"  data-bs-toggle="modal" data-bs-target="#capaModal">

                    <div class="rv-btn" style="text-align:center;">
                        ALTERAR CAPA
                    </div>
                </a>
            <!-- CAPA MODAL -->
                <div class="modal fade" id="capaModal" tabindex="-1" aria-labelledby="capaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-sm">
                            
                                <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                                
                            <div class="modal-body">
                                <form style="width:70%;display:block;margin:0 auto;" action="livro.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $livro['id'] ?>" name="id">
                                        <input type="hidden" value="capa" name="tipo">
                                        <input type="hidden" value="<?php echo $livro['capa'] ?>" name="capaatual">
                                        <label for="exampleInputTitulo">Inserir capa</label>
                                        <input type="file" class="form-control" name="capa" required>
                                    </div><br>
                                    
                                    <button type="submit" class="btn btn-primary rv-btn-submit" >ALTERAR CAPA</button>
                                </form>
                            </div>
                        <br><br><br>
                        </div>
                    </div>
                </div>
            <!-- FIM MODAL -->
            <!-- FIM SESSOES -->
            
            <!-- LIVROS -->
            <a href="" class="a-clean"  data-bs-toggle="modal" data-bs-target="#pdfModal">    
                
                    <div class="rv-btn" style="text-align:center;">
                        ALTERAR ARQUIVO
                    </div>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-sm">
                            
                                <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                                
                            <div class="modal-body">
                                <form style="width:70%;display:block;margin:0 auto;" action="livro.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $livro['id'] ?>" name="id">
                                        <input type="hidden" value="pdf" name="tipo">
                                        <input type="hidden" value="<?php echo $livro['pdf'] ?>" name="pdfatual">
                                        <label for="exampleInputTitulo">Inserir PDF</label>
                                        <input type="file" class="form-control" name="pdf" required>
                                    </div><br>
                                    
                                    <button type="submit" class="btn btn-primary rv-btn-submit" >ALTERAR PDF</button>
                                </form>
                            </div>
                        <br><br><br>
                        </div>
                    </div>
                </div>
            <!-- FIM MODAL -->
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