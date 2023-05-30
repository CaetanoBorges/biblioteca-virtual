<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-admin'])) {
	# mostra a pagina
    //var_dump($_SESSION['metadata']);
	    ?>
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
                    CADASTRAR LIVRO
            </div>
        </div>
        <br><br><br><br><br><br><br>
        <?php 
            include("Classes/Funcoes.php");
            include("Classes/Categoria.php");
            $categorias = new Categoria(Funcoes::conexao());
            $cat = $categorias->getAll();
            
        ?>
        <div style="width:45%;display:inline-block;"> 
            
               <style>
                .rv-btn {width:100%;display:block;background:#d9d9d9;height:30;margin: 10px 0;border:none;padding:2%}
               </style>
                
            <form action="Classes/Livro/adicionar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_admin" value="<?php echo $_SESSION['metadata']['id'] ?>">

                <div class="form-group">
                    <label for="exampleInputTitulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" id="exampleInputTitulo" required>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputCategoria">Categoria</label>
                    <select name="categoria" id="" class="form-control" required>
                        <?php
                            foreach($cat as $categoria){ ?>
                                <option value="<?php echo $categoria["id"]; ?>"><?php echo $categoria["nome"]; ?></option>
                           <?php }
                        ?>
                        
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputAutor">Autor</label>
                    <input type="text" class="form-control" name="autor" required>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputDescricao">Descrição</label>
                    <textarea type="text" class="form-control" name="descricao" required style="height:100px"></textarea>
                </div>
                <br>
                

            
        </div>

        <!-- SESSOES -->
        <div style="width:35%;float:right;"> 
            <div class="form-group">
                <label for="exampleInputEmail1">Inserir capa</label>
                <input type="file" name="capa" class="form-control" id="exampleInputEmail1" required>
            </div>
        <br>
            <div class="form-group">
                <label for="exampleInputEmail1">Inserir PDF</label>
                <input type="file" name="pdf" class="form-control" id="exampleInputEmail1" required>
            </div>
        <br>
        <button type="submit" class="btn-principal rv-btn-submit" >CADASTRAR LIVRO</button>
        <br>
        </form>


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