<?php
    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $sql = database::conectar()->prepare("SELECT * FROM `bufe_admin.usuarios` WHERE user = ? AND password = ?");
        $sql->execute(array($user,$password));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['img'] = $info['img'];
            Painel::redirect(INCLUDE_PATH_PAINEL);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_PAINEL; ?>bufe_css/estilos.css" rel="stylesheet"/>
    <title>Login</title>
</head>
<body>

    <div class="container-login">
        <form id="form2" method="post">
            <?php 
                if(isset($_POST['acao']) && $_POST['identificador'] == 'form_painelbf'){
                    $user = $_POST['user'];
                    $password = $_POST['password'];
                    $sql = database::conectar()->prepare("SELECT * FROM `bufe_admin.usuarios` WHERE user = ? AND password = ?");
                    $sql->execute(array($user,$password));
                    if($sql->rowCount() == 1){
                        $info = $sql->fetch();
                        $_SESSION['login'] = true;
                        $_SESSION['user'] = $user;
                        $_SESSION['password'] = $password;
                        $_SESSION['nome'] = $info['nome'];
                        $_SESSION['cargo'] = $info['cargo'];
                        $_SESSION['img'] = $info['img'];
                        if(isset($_POST['lembrar'])){
                            setcookie('lembrar','true',time()+(60*60*24),'/');
                            setcookie('user',$user,time()+(60*60*24),'/');
                            setcookie('password',$password,time()+(60*60*24),'/');
                        }
                        Painel::redirect(INCLUDE_PATH_PAINEL);
                    }else{
                        echo '<h1 style="background-color:red; color:white;" >usuario ou senha incorreto<h1>';
                    }
                }
            ?>
            <h2>Faça seu login!<h2>
            <div><input type="text" name="user" placeholder="Usuario..."></div>
            <div><input type="password" name="password" placeholder="Senha..."></div>
            <input type="hidden" name="identificador" value="form_painelbf">
            <div class="form-group-login">
                <label>Lembrar-me<label>
                <input type="checkbox" name="lembrar">
            </div><!--form-group-login-->
            <div><input type="submit" name="acao" value="Enviar"></div>
            
            
        <form>
    </div><!--container-login-->


</body>
</html>