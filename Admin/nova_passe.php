<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="_arq/bootstrap/css/bootstrap.min.css">
            <script src="_arq/bootstrap/js/bootstrap.min.js"></script>
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
                        <form action="Classes/Administrador/nova_passe.php" method="post">
                            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                            <input type="hidden" name="codigo" value="<?php echo $_GET['codigo']; ?>">
                            <input type="password" name="passe" class="form-control" placeholder="Nova palavra-passe" required> <br>
                            <br>
                            <button type="submit" class="btn btn-md bg-lar center">RENOVAR</button><br>
                        </form>

                    </div>
                </div>
            </div>


        </body>
        </html>