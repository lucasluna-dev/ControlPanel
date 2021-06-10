<?php 
    $infoSite = database::conectar()->prepare("SELECT * FROM `tb_bufe.config`");
    $infoSite->execute();
    $config = $infoSite->fetch();
?>
<div class="box-content">
    <h2><i class="fas fa-pencil-alt"></i> Editar Site</h2>

    <form method="post" enctype="multipart/form-data">
        <?php 

            if(isset($_POST['acao']) && $_POST['config_geral'] == 'config_g'){
                $titulo_site = $_POST['titulo_site'];
                $telefone= $_POST['telefone'];
                $titulo_missao = $_POST['titulo_missao'];
                $texto_missao = $_POST['texto_missao'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];
                $degustacao = $_POST['degustacao'];
                $email = $_POST['email'];
                $cidade = $_POST['cidade'];
                $titulo_footer = $_POST['titulo_footer'];
                $texto_footer = $_POST['texto_footer'];
                if($imagem['name'] != ''){
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = painel::uploadFile($imagem);
                        Painel::updateconfig($titulo_site, $telefone,$titulo_missao,$texto_missao,$imagem,$degustacao,$email,$cidade,$titulo_footer,$texto_footer);
                        Painel::alert('sucesso','Configuração geral atualizado com sucesso!');
                    }else{
                        Painel::alert('erro','O Formato da imagem não é valido!');
                    }
                }else{
                    $imagem = $imagem_atual;
                    Painel::updateconfig($titulo_site, $telefone,$titulo_missao,$texto_missao,$imagem,$degustacao,$email,$cidade,$titulo_footer,$texto_footer);
                    Painel::alert('sucesso','Configuração geral atualizado com sucesso!');
                }
            }

        ?>

        <div class="form-group">
            <label>Titulo do site:</label>
            <input type="text" name="titulo_site" required value="<?php echo $config['titulo_site']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" required value="<?php echo $config['telefone']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Titulo / Missão da Empresa:</label>
            <input type="text" name="titulo_missao" required value="<?php echo $config['titulo_missao']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Texto / Missão da Empresa:</label>
            <textarea class="tinymce" name="texto_missao"><?php echo $config['texto_missao']; ?></textarea required>
        </div><!--form-group-->


        <div class="form-group">
            <label>Imagem / Missão da Empresa: </label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $config['img_missao']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Texto de Degustação</label>
            <textarea class="tinymce" name="degustacao"><?php echo $config['degustacao']; ?></textarea required>
        </div><!--form-group-->

        <div class="form-group">
            <label>E-mail da Empresa:</label>
            <input type="text" name="email" required value="<?php echo $config['email']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Endereço da Empresa</label>
            <input type="text" name="cidade" required value="<?php echo $config['cidade']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Titulo do rodapé</label>
            <input type="text" name="titulo_footer" required value="<?php echo $config['titulo_footer']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Texto do rodapé</label>
            <textarea class="tinymce" type="text" name="texto_footer" required><?php echo $config['texto_footer']; ?></textarea >
        </div><!--form-group-->


        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
            <input type="hidden" name="config_geral" value="config_g">
        </div><!--form-group-->
    <form>
<div><!--box-content-->