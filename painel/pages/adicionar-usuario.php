    <?php
    echo verificarPermissaoPagina('2');
?>

<div class="box-content">
    <h2><i class="fas fa-pencil-alt"></i> Adicionar Usuário</h2>
    
    <form method="post" enctype="multipart/form-data">
        <?php 

            if(isset($_POST['acao'])){
              $login = $_POST['login'];
              $nome = $_POST['nome'];
              $password = $_POST['password'];
              $cargo = $_POST['cargo'];
              $imagem = $_FILES['imagem'];

              if($login == ''){
                Painel::alert('erro','Login está vazio!');
              }else if($nome == ''){
                Painel::alert('erro','Nome está vazio!');
              }else if($password == ''){
                Painel::alert('erro','Senha está vazio!');
              }else if($cargo == ''){
                Painel::alert('erro','O cargo pecisa está selecionado!');
              }else if($imagem['name'] == ''){
                Painel::alert('erro','A imagem precisa está selecionada!');
              }else{
                  if($cargo >= $_SESSION['cargo']){
                    Painel::alert('erro','Você precisa selecionar um cargo menor que o seu.');
                  }else if(Painel::imagemValida($imagem) == false){
                    Painel::alert('erro','O formato da imagem não é valido!');
                  }else if(Usuario::userExists($login)){
                    Painel::alert('erro','O login digitado já existe, selecione outro por favor!');
                  }
                  else{
                    $usuario = new Usuario();
                    $imagem = Painel::uploadFile($imagem);
                    $usuario->cadastrarUser($login,$password,$imagem,$nome,$cargo);
                    Painel::alert('sucesso','O cadastro do usuario' .$login. 'foi feito com sucesso!');
                  }
                  
              }
              
            }

        ?>
        
        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login">
        </div><!--form-group-->

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome">
        </div><!--form-group-->


        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password">
        </div><!--form-group-->

        <div class="form-group">
            <label>Cargo:</label>
            <select name='cargo'>
                <?php
                
                    foreach(Painel::$cargo as $key => $value){
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                ?>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->