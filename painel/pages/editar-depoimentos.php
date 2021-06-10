<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $depoimentos = Painel::Select('tb_clientes_depoimentos','id=?',array($id));
    }else{
        Painel::alert('erro','É preciso passar um id valido!');
        die();
    }
?>
<div class="box-content">
<h2> <i style="color:green; font-size:;" class="fas fa-file-alt"></i> Editar Depoimento</h2>
    
   

    <form method="post" enctype="multipart/form-data">
        <?php 
        
            if(isset($_POST['acao']) && $_POST['editar_depoimento'] == 'ed_depoimento'){
                $nome = $_POST['nome'];
                $depoimento = $_POST['depoimento'];
                $id = (int)$_GET['id'];
                if($nome == '' || $depoimento == ''){
                    Painel::alert('erro','Campos vazios não são permitdos!');
                }else{
                    if(Painel::update($nome,$depoimento,$id)){

                    }
                    $depoimentos = Painel::Select('tb_clientes_depoimentos','id=?',array($id));
                    Painel::alert('sucesso','Depoimento de ' .$nome. 'Atualizado com sucesso!');
                }
                
            }

        ?>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $depoimentos['nome'];?>" required>
        </div><!--form-group-->

        <div class="form-group">
            <label>Depoimentos:</label>
            <textarea name="depoimento"><?php echo $depoimentos['depoimento'];?></textarea required>
        </div><!--form-group-->

     
        <div class="form-group">
            <input type="hidden" name="editar_depoimento" value="ed_depoimento">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->
</div><!--box-content-->
