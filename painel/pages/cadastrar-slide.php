
<div class="box-content">
    <h2><i class="fas fa-pencil-alt"></i> Adicionar Slide</h2>
    
    <form method="post" enctype="multipart/form-data">
        <?php 

            if(isset($_POST['acao'])){
              $nome = $_POST['nome'];
              $imagem = $_FILES['imagem'];
              $order_id = $_POST['order_id'];

              if($nome == ''){
                Painel::alert('erro','Nome está vazio!');
              }else if($imagem['name'] == ''){
                Painel::alert('erro','A imagem precisa está selecionada!');
              }else{
                  if(Painel::imagemValida($imagem) == false){
                    Painel::alert('erro','O formato da imagem não é valido!');
                  }
                  else{
                    $imagem = Painel::uploadFile($imagem);
                    Painel::cadastrarSlide($nome,$imagem,$order_id);
                    Painel::updateOrderIdSlide();
                   
                  }
                  Painel::alert('sucesso','Slide cadastrado com sucesso!');
              }
              
            }

        ?>
        
      

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome">
        </div><!--form-group-->



        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->