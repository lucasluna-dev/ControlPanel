<div class="box-content">
<h2> <i style="color:green; font-size:;" class="fas fa-file-alt"></i> Cadastar imagens na Galeria</h2>
    
   

    <form method="post" enctype="multipart/form-data">
        <?php 
        
            if(isset($_POST['acao']) && $_POST['form_servicosimg'] == 'f_servicosimg'){

                $conteudo = $_POST['conteudo'];
                $img = $_FILES['imagem'];
                $order_id = $_POST['order_id'];

                if(Painel::imagemValida($img) == false){
                    Painel::alert('erro','O formato da imagem não é valido!');
                }else{
                   
                    $img = Painel::uploadFile($img);
                    Painel::imgServicosInsert($conteudo,$img,$order_id);
                    Painel::updateOrderIdServicosImg();
                    
                    Painel::alert('sucesso','Cadastro de Serviços feito com sucesso!');
                }

                
            }

        ?>
        
       
        <div class="form-group">
            <label> 1 - Texto da Galeria</label>
            <textarea  class="tinymce" name="conteudo"></textarea>
        </div><!--form-group-->


        <div class="form-group">
            <label>Inserir imagem na Galeria:</label>
            <input type="file" name="imagem">
        </div><!--form-group-->

       

        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="form_servicosimg" value="f_servicosimg">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->
</div><!--box-content-->

