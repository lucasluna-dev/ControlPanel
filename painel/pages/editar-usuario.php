<div class="box-content">
    <h2><i class="fas fa-pencil-alt"></i> Editar Usuário</h2>
    
   

    <form method="post" enctype="multipart/form-data">
        <?php 

            if(isset($_POST['acao'])){
                $nome = $_POST['nome'];
                $password = $_POST['password'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];
                $usuario = new Usuario();

                if($imagem['name'] != ''){
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = painel::uploadFile($imagem);
                        if($usuario->atualizarUsuario($nome,$password,$imagem)){
                            $_SESSION['img'] = $imagem;
                            Painel::alert('sucesso','Usuario atualizado com sucesso com a imagem!');
                        }else{
                            Painel::alert('erro','Usuario Não atualzado com a imagem!');
                        }
                        
                    }else{
                        Painel::alert('erro','O Formato da imagem não é valido!');
                    }
                }else{
                    $imagem = $imagem_atual;
                    if($usuario->atualizarUsuario($nome,$password,$imagem)){
                        $_SESSION['nome'] = $nome;
                        Painel::alert('sucesso','Usuario ' .$nome. ' atualizado com sucesso!');
                    }else{
                        Painel::alert('erro','Usuario Não atualzado!');
                    }
                }
            }

        ?>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" required value="<?php echo $_SESSION['password']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    <form>
<div><!--box-content-->