<?php
session_start();

if (isset($_SESSION['bibliotecavirtual-admin'])) {
	# mostra a pagina
    function quando($quando){
        date_default_timezone_set("Africa/Luanda");
        return date("d-m-Y H:i:s A",$quando);
    }

	# mostra a pagina
   
    if(isset($_POST["tipo"]) AND $_POST["tipo"] == "audio"){
        include("Classes/Funcoes.php");
        include("Classes/Audio.php");

        $audioBook = time().$_FILES["audio"]["name"];
        move_uploaded_file($_FILES["audio"]["tmp_name"], "Classes/Audio/files/".$audioBook);

        $audio = new Video(Funcoes::conexao());
        $audio->alterarVideo($_POST["id"], $audioBook);
        unlink("Classes/Audio/files/".$_POST["audioatual"]);
        header("Location: audiobook.php?q=".$_POST["id"]);
        return;
    }
    
    
    if(isset($_GET["tipo"]) AND $_GET["tipo"] == "detalhes"){
        include("Classes/Funcoes.php");
        include("Classes/Audio.php");
        $video = new Audio(Funcoes::conexao());
        $video->alterarDetalhes($_GET["id"], $_GET["categoria"], $_GET["titulo"], $_GET["autor"], $_GET["descricao"]);
        header("Location: audiobook.php?q=".$_GET["id"]);
        return;
    }
    
	# mostra a pagina
    include("Classes/Funcoes.php");
    include("Classes/Audio.php");
    include("Classes/Categoria.php");

    $Audio = new Audio(Funcoes::conexao());
    $audio = $Audio->get($_GET["q"]);

    $Cat = new Categoria(Funcoes::conexao());
    $Categoria = $Cat->get($audio["categoria"]);
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
    <title><?php echo $audio['titulo'] ?></title>
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
                    <?php echo $audio['titulo'] ?>
            </div>
        </div>
        <br><br><br><br><br><br><br>

        <div style="width:45%;display:inline-block;"> 
            
               <style>
                .rv-btn {width:100%;display:block;background:#d9d9d9;height:30;margin: 10px 0;border:none;padding:2%}
               </style>
            
                <div class="form-group">
                    <label for="exampleInputTitulo">Titulo</label>
                    <input type="text" class="form-control" value="<?php echo $audio['titulo'] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputCategoria">Categoria</label>
                    <input type="text" class="form-control" value="<?php echo $Categoria["nome"] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputData">Data de publicação na biblioteca</label>
                    <input type="text" class="form-control" value="<?php echo quando($audio['quando']) ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputAutor">Autor</label>
                    <input type="text" class="form-control" value="<?php echo $audio['autor'] ?>" disabled>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputDescricao">Descrição</label>
                    <textarea type="text" class="form-control" id="exampleInputDescricao" disabled style="height:100px"><?php echo $audio['descricao'] ?></textarea>
                </div>
                <br>
                <button class="rv-btn" type="button" data-bs-toggle="modal" data-bs-target="#dadosModal">EDITAR DADOS</button>
                <!-- Dados Modal -->
                <div class="modal fade" id="dadosModal" tabindex="-1" aria-labelledby="dadosModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-sm">
                            
                                <button type="button" data-bs-dismiss="modal"  class="fecha-modal"></button><br><br>
                                
                            <div class="modal-body">
                                <form style="width:70%;display:block;margin:0 auto;" action="audiobook.php" method="get">
                                    <input type="hidden" value="<?php echo $audio['id'] ?>" name="id">
                                    <input type="hidden" value="detalhes" name="tipo">
                                    <div class="form-group">
                                        <label for="exampleInputTitulo">Titulo</label>
                                        <input type="text" class="form-control" value="<?php echo $audio['titulo'] ?>" name="titulo" required>
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
                                        <input type="text" class="form-control" value="<?php echo quando($audio['quando']) ?>" disabled>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputAutor">Autor</label>
                                        <input type="text" class="form-control" value="<?php echo $audio['autor'] ?>" name="autor" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputDescricao">Descrição</label>
                                        <textarea type="text" class="form-control" name="descricao" required style="height:100px"><?php echo $audio['descricao'] ?></textarea>
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
                <?php echo $audio['acesso'] ?>
            </div>
            <div class="grande bg-gray">
                ACESSOS
            </div>
            </div>
            <br>
            <audio src="Classes/Audio/files/<?php echo $audio["audio"]?>" style="width:100%;display:block;" controls></audio>
            
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
                                <form style="width:70%;display:block;margin:0 auto;" id="uploadForm">
                                    <div class="form-group">
                                        <input type="hidden" name="id_admin" value="<?php echo $_SESSION['metadata']['id'] ?>">
                                        <input type="hidden" value="<?php echo $audio['id'] ?>" name="id">
                                        <input type="hidden" value="<?php echo $audio['audio'] ?>" name="antigo">
                                        <label for="exampleInputTitulo">Inserir arquivo de audio</label>
                                        <input type="file" class="form-control" name="audio" id="exampleInputTitulo" required>
                                    </div><br>
                                    
                                    <!-- Progress bar -->
                                    <div class="progress">
                                        <div class="progress-bar"></div>
                                    </div>
                                    <!-- Display upload status -->
                                    <div id="uploadStatus"></div>
                                    <script src="_assets/jquery.js"></script>
                                    </div><br>
                                    <button type="submit" class="btn btn-primary rv-btn-submit">ALTERAR AUDIO</button>
                                </form>
                                <br>
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

<script>
$(document).ready(function(){
    // File upload via Ajax
    $("#uploadForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(Math.ceil(percentComplete)+'%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: 'Classes/Audio/atualizar.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
                $('#uploadStatus').html('<img src="load.gif"/>');
            },
            error:function(){
                $('#uploadStatus').html('<p style="color:#EA4335;">Carregamento falhou.</p>');
            },
            success: function(resp){
                console.log(resp);
                if(resp){
                    $('#uploadForm')[0].reset();
                    $('#uploadStatus').html('<p style="color:#28A74B;">Carregamento bem sucedido!</p>');
                    location.reload();
                }else if(resp == 'err'){
                    $('#uploadStatus').html('<p style="color:#EA4335;">Por favor, selecione o arquivo certo.</p>');
                }
            }
        });
    });
	
    // File type validation
    $("#fileInput").change(function(){
        var allowedTypes = ['video/mp4'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)){
            alert('Please select a valid file (audio/mp3).');
            $("#fileInput").val('');
            return false;
        }
    });
});
</script>
</body>
</html>
<?php 

}
?>