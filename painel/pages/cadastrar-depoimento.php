
<div class="box-content">
<h2> <i style="color:green; font-size:;" class="fas fa-file-alt"></i> Cadastar Depoimento</h2>
    
   

    <form method="post" enctype="multipart/form-data">
        <?php 
        
            if(isset($_POST['acao']) && $_POST['form_depoimento'] == 'f_depoimento'){
                $nome = $_POST['nome'];
                $depoimento = $_POST['depoimento'];
                $order_id = $_POST['order_id'];
                if($nome == ''){
                    Painel::alert('erro','Campo Nome ficou vazio!');
                }else if($depoimento == ''){
                    Painel::alert('erro','Campo Depoimento ficou vazio!');
                }
                else{
                    if(Painel::testimunialInsert($nome,$depoimento,$order_id));
                    if(Painel::updateOrderId());
                    Painel::alert('sucesso','depoimento de ' .$nome. ' cadastrado com sucesso!');
                }
            }

        ?>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required>
        </div><!--form-group-->

        <div class="form-group">
            <label>Depoimentos:</label>
            <textarea name="depoimento"></textarea required>
        </div><!--form-group-->

     
        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="form_depoimento" value="f_depoimento">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->
</div><!--box-content-->

