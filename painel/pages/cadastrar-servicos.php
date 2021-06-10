<div class="box-content">
<h2> <i style="color:green; font-size:;" class="fas fa-file-alt"></i> Cadastar Servicos</h2>
    
   

    <form method="post" enctype="multipart/form-data">
        <?php 
        
            if(isset($_POST['acao']) && $_POST['form_servicos'] == 'f_servicos'){
                $titulo_servicos = $_POST['titulo_servicos'];
                $subtitulos_servicos = $_POST['subtitulo_servicos'];
                $img = $_FILES['imagem'];
                $order_id = $_POST['order_id'];
                $conteudo = $_POST['conteudo'];
                
                

                if(Painel::imagemValida($img) == false){
                    Painel::alert('erro','O formato da imagem não é valido!');
                }else{
                   
                    $img = Painel::uploadFile($img);
                    Painel::servicosInsert($titulo_servicos,$subtitulos_servicos,$img,$conteudo,$order_id);
                    Painel::updateOrderIdServicos();
                    
                    Painel::alert('sucesso','Cadastro de Serviços feito com sucesso!');
                }

                
            }

        ?>
        
        <div class="form-group">
            <label>Titulo do serviço:</label>
            <input placeholder=" Exemplo: Ceia de pascoa"  type="text" name="titulo_servicos" required>
        </div><!--form-group-->

        <div class="form-group">
            <label>Subtitulo do serviço:</label>
            <input  type="text" name="subtitulo_servicos">
        </div><!--form-group-->

        <div class="form-group">
            <label>Inserir imagem:</label>
            <input type="file" name="imagem">
        </div><!--form-group-->
        

        <div class="form-group">
            <label>Conteúdo do cardápio</label>
            <textarea class="tinymce" name="conteudo"></textarea>
        </div><!--form-group-->

       

        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="form_servicos" value="f_servicos">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->
</div><!--box-content-->

