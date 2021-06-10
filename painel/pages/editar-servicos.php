<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
       $servicos = Painel::Select('tb_bufe.servicos','id=?',array($id));
    }else{
        Painel::alert("erro",'É preciso passar um ID!');
        die();
    }

?>

<div class="box-content">
<h2> <i style="color:green; font-size:;" class="fas fa-file-alt"></i> Cadastar Servicos</h2>
    
   

    <form method="post" enctype="multipart/form-data">
        <?php 
        
            if(isset($_POST['acao']) && $_POST['editar-servicos'] == 'ed_servicos'){
                $titulo_servicos = $_POST['titulo_servicos'];
                $subtitulo_servicos = $_POST['subtitulo_servicos'];
                $id = (int)$_GET['id'];
                $imagem_atual = $_POST['imagem_atual'];
                $img = $_FILES['img'];
                $conteudo = $_POST['conteudo'];
                
                if($img['name']  != '' ){
                    if(Painel::imagemValida($img)){
                        Painel::deleteFile($imagem_atual);
                        $img = painel::uploadFile($img);
                        if(Painel::updateServicos($titulo_servicos,$subtitulo_servicos,$img,$conteudo,$id)){
                            
                        }
                        Painel::alert('sucesso','Serviço atualizado com sucesso e com a imagem!');
                    }else{
                        Painel::alert('erro','O Formato da imagem não é valido!');
                    }
                }else{
                    $img = $imagem_atual;
                    if(Painel::updateServicos($titulo_servicos,$subtitulo_servicos,$img,$conteudo,$id)){
                        
                    }
                    $servicos = Painel::Select('tb_bufe.servicos','id=?',array($id));
                    Painel::alert('sucesso','Serviço atualizado com sucesso e com a imagem!');
                }
                    
            }
                

        ?>
        
        
        <div class="form-group">
            <label>Titulo do serviço:</label>
            <input placeholder=" Exemplo: Ceia de pascoa"  type="text" name="titulo_servicos" value="<?php echo $servicos['titulo_servicos'];?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Subtitulo do serviço:</label>
            <input value="<?php echo $servicos['subtitulo_servicos'];?>"  type="text" name="subtitulo_servicos"  >
        </div><!--form-group-->

            
        <div class="form-group">
            <label>Inserir imagem:</label>
            <input type="file" name="img">
            <input type="hidden" name="imagem_atual" value="<?php echo $servicos['img'];?>">
        </div><!--form-group-->

       
        <div class="form-group">
            <label>Conteúdo do cardápio</label>
            <textarea class="tinymce" name="conteudo" ><?php echo $servicos['conteudo'];?></textarea>
        </div><!--form-group-->

        
        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="editar-servicos" value="ed_servicos">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->
</div><!--box-content-->