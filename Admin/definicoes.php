<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-admin'])) {
	# mostra a pagina
    $metadata = $_SESSION['metadata'];

    include("_controlers/definicoes/definicoes.php");



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
    <title>Home</title>
</head>
<body>
    <style>
        .fecha-modal{width:20px;height:20px;border-radius:50%;background-color:#D07746;border:none;position:absolute;top:10px;right:10px;}
    </style>
    <div class="corpo">
        <?php include("_partes/top.php"); ?>

        <br><br><br><br><br><br><br><br>
        <img src="_assets/banner-def.png" class="banner">

        <br><br><br><br><br><br><br>
        
        <div style="width:48%;display:inline-block;"> 
            
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        &nbsp;
                    </div>
                    <div class="grande bg-gray">
                        <?php echo $metadata["nome"]; ?>
                    </div>
                </div>
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        &nbsp;
                    </div>
                    <div class="grande bg-gray">
                        <?php echo $metadata["email"]; ?>
                    </div>
                </div>
        </div>

        <!-- HISTORICO -->
        <div style="width:48%;float:right;"> 
            <a href="" class="a-clean"  data-bs-toggle="modal" data-bs-target="#historicoModal">
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        HISTORICO PALAVRA-PASSE
                    </div>
                </div>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="historicoModal" tabindex="-1" aria-labelledby="historicoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modal-sm">
                        
                            <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                            <h5  style="margin-top:50px;text-align:center">Histórico de alteração da palavra-passe</h5>
                        <br><br>
                        <div class="modal-body">
                            <ul style="margin-left:60px;">
                            <?php 
                                $passes = log_passe($metadata['email']);
                                foreach($passes as $passe){
                                    $passe = (array) $passe;
                                    echo '<li>'.quando($passe['momento']).'</li>';
                                }
                            ?>
                            </ul>
                        </div>
                    <br><br><br>
                    </div>
                </div>
            </div>
            <!-- FIM MODAL -->
            <!-- FIM HISTORICO -->
            
            <!-- ACESSO -->
            <a href="" class="a-clean"  data-bs-toggle="modal" data-bs-target="#acessoModal">    
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        HISTORICO DE ACESSO
                    </div>
                </div>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="acessoModal" tabindex="-1" aria-labelledby="acessoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modal-sm">
                                              
                            <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button>
                            <br><br>
                            <h5 style="margin-top:50px;text-align:center">Histórico de inicio de sessão</h5>
                        <br><br>
                        <div class="modal-body">
                            <ul style="margin-left:60px;">
                             <?php 
                                $sessoes = log_sessao($metadata['id']);
                                foreach($sessoes as $sessao){
                                    $sessao = (array) $sessao;
                                    echo '<li>'.quando($sessao['momento']).' -> '.$sessao['acao'].'</li>';
                                }
                            ?>
                            </ul>
                        </div>
                    <br><br><br>
                    </div>
                </div>
            </div>
            <!-- FIM MODAL -->
            <!-- FIM ACESSO -->

            <!-- PALAVRAPASSE -->
            <a href="" class="a-clean" data-bs-toggle="modal" data-bs-target="#palavrapasseModal">
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        ALTERAR PALAVRA-PASSE
                    </div>
                </div>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="palavrapasseModal" tabindex="-1" aria-labelledby="palavrapasseModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                            
                            <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button>
                            <br><br>
                            <h5 style="margin-top:50px;text-align:center">Alterar palavra passe</h5>
                        <br><br><br>
                        <div class="modal-body">
                            <form class="rv-form-alterar">
                                <div class="mb-3">
                                    <input type="password" class="form-control" required placeholder="Palavra-passe antiga">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" required placeholder="Palavra-passe nova">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary rv-btn-submit" >ALTERAR</button>
                                <br><br><br><br><br><br>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- FIM MODAL -->
            <!-- FIM PALAVRAPASSE -->


            
            <!--DETALHES -->
            <a href="" class="a-clean" data-bs-toggle="modal" data-bs-target="#detalhesModal">
                <div class="btn-principal">
                    <div class="pequena bg-leaf">
                        &nbsp;
                    </div>
                    <div class="grande bg-yel">
                        ALTERAR DETALHES
                    </div>
                </div>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="detalhesModal" tabindex="-1" aria-labelledby="detalhesModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                            
                            <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                            <h5 style="margin-top:50px;text-align:center">Alterar detalhes</h5>
                        <br><br><br>
                        <div class="modal-body">
                            <form class="rv-form-alterar">
                                <div class="mb-3">
                                    <input type="text" class="form-control" required placeholder="<?php echo $metadata["nome"]; ?>" value="<?php echo $metadata["nome"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" required placeholder="<?php echo $metadata["email"]; ?>" value="<?php echo $metadata["email"]; ?>">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary rv-btn-submit" >ALTERAR</button>
                                <br><br><br><br><br><br>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- FIM MODAL -->
            <!-- FIM DETALHES -->

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