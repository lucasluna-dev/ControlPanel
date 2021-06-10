<?php

    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $Slide = Painel::Select('tb_bufe.slides','id=?',array($id));
    }else{
        Painel::alert('erro','É preciso passar um id valido!');
        die();
    }

?>

<div class="box-content">
    <h2><i class="fas fa-pencil-alt"></i> Editar Slide</h2>
    
   

    <form method="post" enctype="multipart/form-data">
        <?php 

            if(isset($_POST['acao'])){
                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];
                $id = (int)$_GET['id'];
                if($imagem['name'] != ''){
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = painel::uploadFile($imagem);
                        Painel::updateSlide($nome,$imagem,$id);
                        $Slide = Painel::Select('tb_bufe.slides','id=?',array($id));
                        Painel::alert('sucesso','Slide atualizado com sucesso e com a imagem!');
                    }else{
                        Painel::alert('erro','O Formato da imagem não é valido!');
                    }
                }else{
                    $imagem = $imagem_atual;
                    Painel::updateSlide($nome,$imagem,$id);
                    $Slide = Painel::Select('tb_bufe.slides','id=?',array($id));
                    Painel::alert('sucesso','Slide atualizado com sucesso!');
                }
            }

        ?>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $Slide['nome']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $Slide['slide']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->