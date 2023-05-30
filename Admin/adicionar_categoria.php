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
                        ADICIONAR CATEGORIA
            </div>
        </div>
        <br><br><br>
        <form action="Classes/Categoria/adicionar.php" method="POST">
        <input type="hidden" name="id_admin" value="<?php echo $_SESSION['metadata']['id'] ?>">
        <div class="form-group" style="width:49%;display:inline-block;">
            <label for="exampleInputEmail1" >Nome</label>
            <input type="text" name="nome" class="form-control" id="exampleInputEmail1" required>
        </div>
        <div class="form-group" style="width:25%;float:right;">
            <label for="exampleInputEmail1" >&nbsp;</label>
            <button type="submit" class="rv-btn rv-btn-submit" style="margin:0;padding:3%;text-align:center;cursor:pointer;padding-right: 10px;padding-left: 10px;">
                ADICIONAR CATEGORIA
            </button>
        </div>
        </form>
        <br><br><br><br>

       

        <br><br><br><br><br><br><br><br>
        
        <br><br><br><br><br><br><br><br>
    </div>

    <?php include("_partes/pes.php"); ?>

</body>
</html>
<?php 

}
?>