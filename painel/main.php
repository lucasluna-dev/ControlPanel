<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_PAINEL;?>bufe_css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">     
    <title>Painel de Controle</title>
</head>
<body>
    <header>    
        <div class-="center">
            <div class="icon-menu">
                <i class="fas fa-bars"></i>
            </div>
            
            <!--TOFDO: FAZER BOTAO DA HOME PARA MOBILE DE 320PX-->
            <div class="bnts-header">
            <a class="mover-home" href="<?php echo INCLUDE_PATH_PAINEL;?>"><i class="fa fa-home"></i>Pagina home</a>
            <a class="mover-sair" href="<?php echo INCLUDE_PATH_PAINEL;?>?loggout">SAIR-X</a>
            </div><!--loggout-->
            <div class="clear"><div>
    </header>

    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">    
                <?php
                    if($_SESSION['img'] == ''){
                ?>
                <div class="avatar-usuario">
                    <div style=" background-image: url(<?php echo INCLUDE_PATH_PAINEL;?>image/avatar-img.png);" class="avatar-img"></div>
                </div><!--Avatar-usuario-->
                <?php } else{?>
                    <div class="img-usuario">
                        <img src="<?php echo INCLUDE_PATH_PAINEL;?>upload/<?php echo $_SESSION['img'];?>">
                    </div><!--Avatar-usuario-->
                <?php } ?>

                <div class="nome-usuario">
                    <p><?php echo $_SESSION['nome'];?></p>
                    <p><?php echo Painel::pegaCargo($_SESSION['cargo']);?></p>
                </div><!--nome-usuario-->
            </div><!--box-usuario-->
            
          
                <div class="items-menu"> 
                    <h2 class="home-mobile">Home</h2>
                    <div class="home-mobile" ><a  href="<?php echo INCLUDE_PATH_PAINEL;?>">Pagina Home</a></div>
                    <h2>Cadastro</h2>
                    <a class="home-mobile" href="<?php echo INCLUDE_PATH_PAINEL;?>">Pagina Inicial</a>
                    <a <?php echo selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-depoimento">Cadastrar Depoimento</a>
                    <a <?php echo selecionadoMenu('cadastrar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-servicos">Cadastrar Serviços</a>
                    <a <?php echo selecionadoMenu('cadastrar-slide'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-slide">Cadastrar Slide</a>
                     <a <?php echo selecionadoMenu('imagens-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>imagens-servicos">Cadastrar Galeria</a>
                    <h2>Gestão</h2>
                    <a <?php echo selecionadoMenu('listar-depoimento');?> href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-depoimento">Listar Depoimentos</a>
                    <a <?php echo selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>listar-servicos">Listar Serviços</a>
                    <a <?php echo selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>listar-slides">Listar Slides</a>
                    <a <?php echo selecionadoMenu('listar-galeria'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>listar-galeria">Listar Galeria</a>
                    <h2>Administração do painel</h2>
                    <a <?php echo selecionadoMenu('editar-usuario'); ?>  href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-usuario">Editar Usuario</a>
                    <a <?php echo selecionadoMenu('adicionar-usuario'); ?> <?php echo verificarPermissaoMenu('2'); ?>  href="<?php echo INCLUDE_PATH_PAINEL;?>adicionar-usuario">Adicionar Usuário</a>
                    <h2>Configuração Geral</h2>
                    <a <?php echo selecionadoMenu('editar-site'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-site">Editar Site</a>
                </div><!--itens-menu-->
        </div><!--mennu-wraper-->  
    </div><!--menu-->
   
    
  

    <div class="content">
       <?php echo Painel::CarregarPaginaHome(); ?>
      
    </div><!--Box-content-->

<script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL;?>js/mains.js"></script> 
<script src="https://cdn.tiny.cloud/1/0g5usewh0230s997crlyfwzvt59dyldqesz80b4gjkj28eb4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector: '.tinymce',});</script>

</body>
</html>