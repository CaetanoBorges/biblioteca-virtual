<!DOCTYPE html>
    <?php include("_controlers/receber_codigo.php"); ?>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="_arq/bootstrap/css/bootstrap.min.css">
            <script src="_arq/bootstrap/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="_arq/one.css">
            <link rel="stylesheet" href="_arq/admin.css">
            <title>Receber Email</title>
        </head>
        <body>
            <style>
                
            </style>
            <img src="_assets/back.png" class="background">
            <div class="corpo">
                <div class="centro">
                    <div class="inputs">
                        <form action="Classes/Administrador/receber_codigo.php" method="post">
                            <input type="email" name="email" class="form-control" placeholder="Email" required> <br>
                            <br>
                            <button type="submit" class="btn btn-md bg-lar center">RECEBER CÓDIGO DE VERIFICAÇÃO</button><br>
                            <?php if(isset($_GET['erro'])){ echo '<h2 style="color:red">Erro no email</h2>'; } ?>
                        </form>

                    </div>
                </div>
            </div>


        </body>
        </html>