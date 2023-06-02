<?php
session_start();
error_reporting(0);
if (isset($_SESSION['bibliotecavirtual-admin'])) {
    function quando($quando){
        date_default_timezone_set("Africa/Luanda");
        return date("d-m-Y H:i:s A",$quando);
    }

    if(isset($_GET["tipo"]) AND $_GET["tipo"] == "passe"){
        include("Classes/Funcoes.php");
        include("Classes/Usuario.php");
        include("Classes/LogPasse.php");

        $user = new Usuario(Funcoes::conexao());
        $user->alterarPasse($_GET["identificador"],Funcoes::FazHash($_GET["passe"]), new LogPasse(Funcoes::conexao()));
        header("Location: usuario.php?q=".$_GET["identificador"]);
        return;
    }
    if(isset($_GET["tipo"]) AND $_GET["tipo"] == "detalhes"){
    include("Classes/Funcoes.php");
    include("Classes/Usuario.php");
        $user = new Usuario(Funcoes::conexao());
        $user->alterarDetalhes($_GET["identificador"],$_GET["nome"],$_GET["nascimento"],$_GET["telefone"],$_GET["email"]);
        header("Location: usuario.php?q=".$_GET["identificador"]);
        return;
    }
    
	# mostra a pagina
    include("Classes/Funcoes.php");
    include("Classes/Usuario.php");
    include("Classes/Livro.php");
    include("Classes/Audio.php");
    include("Classes/Video.php");
    include("Classes/LogSessao.php");
    include("Classes/LogAudio.php");
    include("Classes/LogVideo.php");
    include("Classes/LogLivro.php");

    $Usuario = new Usuario(Funcoes::conexao());
    $Sessao = new LogSessao(Funcoes::conexao());
    $Audio = new LogAudio(Funcoes::conexao());
    $Video = new LogVideo(Funcoes::conexao());
    $Livro = new LogLivro(Funcoes::conexao());

    $User = $Usuario->get($_GET["q"]);


    $logAudio = $Audio->get($User['identificador']);
    $logAudioShow = array_chunk($logAudio, 10);

    $logVideo = $Video->get($User['identificador']);
    $logVideoShow = array_chunk($logVideo, 10);

    $logLivro = $Livro->get($User['identificador']);
    $logLivroShow = array_chunk($logLivro, 10);

    $logSessao = $Sessao->get($User['identificador']);
    $logSessaoShow = array_chunk($logSessao, 10);

    $Liv = new Livro(Funcoes::conexao());
    $Vid = new Video(Funcoes::conexao());
    $Aud = new Audio(Funcoes::conexao());
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
    <title>USUÁRIO</title>
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
                        <?php echo $User['nome'] ?>
            </div>
        </div>
        <br><br><br><br><br><br><br>

        <div style="width:45%;display:inline-block;"> 
            
               <style>
                .rv-btn {width:100%;display:block;background:#d9d9d9;height:30;margin: 10px 0;border:none;padding:2%}
               </style>
            <form >
                <div class="form-group">
                    <label for="exampleInputEmail1" style="color:#D07746;">Identificador</label>
                    <input type="text" class="form-control" value="<?php echo $User['identificador'] ?>" style="border:1px solid #D07746;" disabled>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" value="<?php echo $User['nome'] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nascimento</label>
                    <input type="date" class="form-control" value="<?php echo $User['nascimento'] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="tel" class="form-control" value="<?php echo $User['telefone'] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" value="<?php echo $User['email'] ?>" disabled>
                </div>
                <br>
                <button class="rv-btn" type="button" data-bs-toggle="modal" data-bs-target="#dadosModal">EDITAR DADOS</button>
                <!-- Dados Modal -->
                <div class="modal fade" id="dadosModal" tabindex="-1" aria-labelledby="dadosModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-sm">
                            
                                <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                                
                            <div class="modal-body">
                                <form action="usuario.php" method="get" style="width:70%;display:block;margin:0 auto;" >
                                    <input type="hidden" name="tipo" value="detalhes">
                                    <input type="hidden" name="identificador" value="<?php echo $User['identificador'] ?>">
                                    <div class="form-group">
                                        <label for="exampleInputNome">Nome</label>
                                        <input type="text" class="form-control" name="nome" value="<?php echo $User['nome'] ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputNascimento">Nascimento</label>
                                        <input type="date" class="form-control" name="nascimento" value="<?php echo $User['nascimento'] ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputTelefone">Telefone</label>
                                        <input type="tel" class="form-control" name="telefone" value="<?php echo $User['telefone'] ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $User['email'] ?>" required>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary rv-btn-submit" >EDITAR DADOS</button>
                                </form>
                            </div>
                        <br><br><br>
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL -->


                <button class="rv-btn" type="button" data-bs-toggle="modal" data-bs-target="#palavrapasseModal">ATUALIZAR PALAVRA-PASSE</button>
                <!-- Dados Modal -->
                <div class="modal fade" id="palavrapasseModal" tabindex="-1" aria-labelledby="palavrapasseModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-sm">
                            
                                <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                                
                            <div class="modal-body">
                                <form action="usuario.php" method="get" style="width:70%;display:block;margin:0 auto;">
                                    <input type="hidden" name="tipo" value="passe">
                                    <input type="hidden" name="identificador" value="<?php echo $User['identificador'] ?>">
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPass">Palavra-passe</label>
                                        <input type="password" class="form-control" name="passe" placeholder="Palavra-passe nova" required>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary rv-btn-submit" >ATUALIZAR PALAVRA-PASSE</button>
                                </form>
                            </div>
                        <br><br><br>
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL -->

            </form>
        </div>

        <!-- SESSOES -->
        <div style="width:35%;float:right;"> 
        <br>
        <div class="btn-principal">
                    <div class="pequena bg-red" style="width:100%;">
                        ATIVIDADES
                    </div>
                </div>
                <br><br><br>
            <a href="" class="a-clean"  data-bs-toggle="collapse" data-bs-target="#sessoesModal">
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($logSessao) ?>
                    </div>
                    <div class="grande bg-gray">
                        SESSÕES
                    </div>
                </div>
            </a>
            <!-- Dados COLLAPSE -->
            <div class="collapse fade" id="sessoesModal" tabindex="-1" aria-labelledby="sessoesModalLabel" aria-hidden="true">
                <ul style="">
                    <?php
                        foreach($logSessaoShow[0] as $show){ 
                            ?>
                            <li><?php echo quando($show['momento']) ?></li>
                       <?php 
                       }
                    ?>
                </ul>
            </div>
            <!-- FIM MODAL -->
            <!-- FIM SESSOES -->
            
            <!-- LIVROS -->
            <a href="" class="a-clean"  data-bs-toggle="collapse" data-bs-target="#livroModal">    
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($logLivro) ?>
                    </div>
                    <div class="grande bg-gray">
                        LIVROS
                    </div>
                </div>
            </a>
            <!-- Modal -->
            <div class="collapse fade" id="livroModal" tabindex="-1" aria-labelledby="livroModalLabel" aria-hidden="true">
                <ul style="">
                    
                    <?php
                        foreach($logLivroShow[0] as $show){ 
                            $nome = $Liv->get($show['livro'])['titulo'];
                            ?>
                            <li><?php echo quando($show['quando']).' :: '.$nome ?></li>
                       <?php 
                       }
                    ?>
                </ul>
            </div>
            <!-- FIM MODAL -->
            <!-- FIM LIVROS -->

            <!-- VIDEOAULA -->
            <a href="" class="a-clean" data-bs-toggle="collapse" data-bs-target="#videoModal">
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($logVideo) ?>
                    </div>
                    <div class="grande bg-gray">
                        VÍDEOS
                    </div>
                </div>
            </a>
            <!-- Modal -->
            <div class="collapse fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                <ul style="">
                    
                    <?php
                        foreach($logVideoShow[0] as $show){ 
                            $nome = $Vid->get($show['video'])['titulo'];
                            ?>
                            <li><?php echo quando($show['quando']).' :: '.$nome ?></li>
                       <?php 
                       }
                    ?>
                </ul>
            </div>
            <!-- FIM MODAL -->
            <!-- FIM VIDEOAULA -->


            <!-- VIDEOAULA -->
            <a href="" class="a-clean" data-bs-toggle="collapse" data-bs-target="#audiobook">
                <div class="btn-principal">
                    <div class="pequena bg-red">
                        <?php echo count($logAudio) ?>
                    </div>
                    <div class="grande bg-gray">
                        AUDIOBOOKS
                    </div>
                </div>
            </a>
            <!-- Modal -->
            <div class="collapse fade" id="audiobook" tabindex="-1" aria-labelledby="audiobookLabel" aria-hidden="true">
                <ul style="">
                    
                    <?php
                        foreach($logAudioShow[0] as $show){ 
                            $nome = $Liv->get($show['audio'])['titulo'];
                            ?>
                            <li><?php echo quando($show['quando']).' :: '.$nome ?></li>
                       <?php 
                       }
                    ?>
                </ul>
            </div>
            <!-- FIM MODAL -->
            <!-- FIM VIDEOAULA -->

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