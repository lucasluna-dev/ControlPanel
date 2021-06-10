<?php

    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $galeria = Painel::Select('tb_bufe.galeria','id=?',array($id));
    }else{
        Painel::alert('erro','É preciso passar um id valido!');
        die();
    }

?>

<div class="box-content">
    <h2><i class="fas fa-pencil-alt"></i> Editar Galeria</h2>
    
   

    <form method="post" enctype="multipart/form-data">
        <?php 

            if(isset($_POST['acao'])){
                $conteudo_galeria= $_POST['conteudo_galeria'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];
                $id = (int)$_GET['id'];
                if($imagem['name'] != ''){
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = painel::uploadFile($imagem);
                        Painel::updateImgServicos($conteudo_galeria,$imagem,$id);
                        $galeria = Painel::Select('tb_bufe.galeria','id=?',array($id));
                        Painel::alert('sucesso','Slide atualizado com sucesso e com a imagem!');
                    }else{
                        Painel::alert('erro','O Formato da imagem não é valido!');
                    }
                }else{
                    $imagem = $imagem_atual;
                    Painel::updateImgServicos($conteudo_galeria,$imagem,$id);
                    $galeria = Painel::Select('tb_bufe.galeria','id=?',array($id));
                    Painel::alert('sucesso','Slide atualizado com sucesso!');
                }
            }

        ?>
       <div class="form-group">
            <label> 1 - Trocar texto da Galeria</label>
            <textarea  class="tinymce" name="conteudo_galeria"><?php echo $galeria['descricao']; ?></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label>Trocar Imagem:</label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $galeria['img']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->