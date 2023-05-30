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
            <script src="_assets/loader.js"></script>
    <link rel="stylesheet" href="_arq/one.css">
    <title>Adicionar Usuário</title>
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
                        CADASTRAR USUÁRIO
            </div>
        </div>
        <br><br><br><br><br><br><br>

        <div style="width:45%;display:inline-block;"> 
            
               <style>
                .rv-btn {width:100%;display:block;background:#d9d9d9;height:30;margin: 10px 0;border:none;padding:2%}
               </style>
            <form action="Classes/Usuario/adicionar.php" method="POST">
                <input type="hidden" name="id_admin" value="<?php echo $_SESSION['metadata']['id'] ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="nome" class="form-control" id="exampleInputEmail1" required>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nascimento</label>
                    <input type="date" name="nascimento" class="form-control" id="exampleInputEmail1" required>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="tel" name="telefone" class="form-control" id="exampleInputEmail1" required>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control"  id="exampleInputEmail1" required>
                </div>
                


                
        </div>

        <!-- SESSOES -->
        <div style="width:35%;float:right;"> 
            <div class="form-group">
                <label for="exampleInputEmail1">Palavra-passe</label>
                <input type="password" name="passe" class="form-control" id="exampleInputEmail1" required>
            </div>
        <br>
        <button type="submit" class="btn-principal rv-btn-submit" >CADASTRAR</button>
        <br><br><br>
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