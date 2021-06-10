<?php include_once('config.php'); ?>
<?php Site::UpdateUsuarioOnline();  ?>
<?php Site::contador(); ?>


 <?php 
    $infoSite = database::conectar()->prepare("SELECT * FROM `tb_bufe.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $infoSite['titulo_site'];?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="@lucasdeluna_dev">
    <meta name="description" content="<?php echo $infoSite['titulo_site'];?> no Rio de Janeiro para aniversários, casamentos, festas, eventos. Entre em contato agora! <?php echo $infoSite['telefone'];?>">
    <meta name="keywords" content="Buffet, Decoração, aniversarios, casamentos, aluguel, brinquedos, festa, eventos">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:title" content="<?php echo $infoSite['titulo_site'];?> no Rio de Janeiro - <?php echo $infoSite['titulo_site'];?> - RJ">
    <meta propety="og:description" content="<?php echo $infoSite['titulo_site'];?> no Rio de Janeiro para aniversários, casamentos, festas, eventos. Entre em contato agora! <?php echo $infoSite['telefone'];?>">
    <meta propety="og:url" content="<?php echo INCLUDE_PATH;?>">
    <meta propety="og:site_name" content="<?php echo $infoSite['titulo_site'];?>">
    <meta propety="article:publisher" content="https://www.facebook.com/021festaseeventos/">
    <meta propety="og:image" content="<?php echo INCLUDE_PATH;?>./painel/upload/<?php echo $infoSite['img_missao'];?>">
    <meta propety="og:image:type" content="image/jpeg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="icon" href="<?php echo INCLUDE_PATH;?>./painel/upload/<?php echo $infoSite['img_missao'];?>" size="32x32" >
    <link href="<?php echo INCLUDE_PATH;?>style/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH;?>style/styles.css" rel="stylesheet">
    
</head>
<body>

        <base base="<?php echo INCLUDE_PATH; ?>"/>

        <header class="header-principal">
            <div class="center"> 
                <div class="logo-marca left"><h1><a alt="Pagina inicial de <?php echo $infoSite['titulo_site'];?>" title='Pagina inicial de <?php echo $infoSite['titulo_site'];?>' href="<?php echo INCLUDE_PATH;?>"><?php echo $infoSite['titulo_site'];?></a></h1></div><!--logo-smarca-->
                <a style="color: white; text-decoration: none;" target="blank" href=" http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $infoSite['telefone'];?>" ><div class="number-phone right"><i  style="color:green; font-size: 28px;" class="fab fa-whatsapp-square"></i>  <?php echo $infoSite['telefone'];?></div></a><!--number-phone-->
                <nav class="menu-desktop right" >
                    <ul>
                        <li><a alt="Pagina inicial de <?php echo $infoSite['titulo_site'];?>" title='Pagina inicial de <?php echo $infoSite['titulo_site'];?>' href="<?php echo INCLUDE_PATH; ?>home">Inicio</a></li>
                        <li><a alt="Sobre a <?php echo $infoSite['titulo_site'];?>" title='Sobre a <?php echo $infoSite['titulo_site'];?>' href="#nossa_empresa" href="<?php echo INCLUDE_PATH; ?>nossa_empresa">Nossa Empresa</a></li>
                        <li><a alt="Serviços de <?php echo $infoSite['titulo_site'];?>" title='Serviços de <?php echo $infoSite['titulo_site'];?>' href="#servicos" href="<?php echo INCLUDE_PATH; ?>servicos">Nossos Serviço</a></li>
                        <li><a alt="Contato de <?php echo $infoSite['titulo_site'];?>" title='Contato de <?php echo $infoSite['titulo_site'];?>' href="#contato"  href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                        <li><a alt="Galeria de imagens <?php echo $infoSite['titulo_site'];?>" title='Galeria de imagens <?php echo $infoSite['titulo_site'];?>' href="<?php echo INCLUDE_PATH; ?>imagens-servicos">Imagens</a></li>
                    </ul>
                </nav><!--menu-desktotp-->
                <div class="clear"></div>

                <div ativarMenu class="icon-menu right" style="background-image: url(<?php echo INCLUDE_PATH;?>./imagens/menu.png);"></div>
                
               
                <nav class="menu-mobile right">
                    <ul>
                    <li><a alt="Pagina inicial de <?php echo $infoSite['titulo_site'];?>" title='Pagina inicial de <?php echo $infoSite['titulo_site'];?>' href="<?php echo INCLUDE_PATH; ?>home">Inicio</a></li>
                        <li><a alt="Sobre a <?php echo $infoSite['titulo_site'];?>" title='Sobre a <?php echo $infoSite['titulo_site'];?>' href="#nossa_empresa" href="<?php echo INCLUDE_PATH; ?>nossa_empresa">Nossa Empresa</a></li>
                        <li><a alt="Serviços de <?php echo $infoSite['titulo_site'];?>" title='Serviços de <?php echo $infoSite['titulo_site'];?>' href="#servicos" href="<?php echo INCLUDE_PATH; ?>servicos">Nossos Serviço</a></li>
                        <li><a alt="Contato de <?php echo $infoSite['titulo_site'];?>" title='Contato de <?php echo $infoSite['titulo_site'];?>' href="#contato"  href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                        <li><a alt="Galeria de imagens <?php echo $infoSite['titulo_site'];?>" title='Galeria de imagens <?php echo $infoSite['titulo_site'];?>' href="<?php echo INCLUDE_PATH; ?>imagens-servicos">Imagens</a></li>
                    </ul>
                </nav><!--menu-desktotp-->
            </div><!--center-->
        </header><!--header-principal-->
        
        <div class="container-principal">
        <?php
        //Incluindo dinamicamente a pasta pages.
            $url = isset($_GET['url']) ? $_GET['url'] : 'home';
            if(file_exists('pages/'.$url.'.php')){
                include('pages/'.$url.'.php');
            }
            else{
                include('pages/erro404.php');
            }

        ?>
        </div><!--container-principal-->

        
        
        
        
        <footer>
            <div class="footer-01">
            <h3><?php echo $infoSite['titulo_footer'];?></h3>
                    <p style="font-size:16px; padding:1px; font-weight: normal ;"><b> <?php echo $infoSite['texto_footer'];?></b></p>
                    <a target="blanck" href="https://www.facebook.com/021festaseeventos/" ><i style=" position:relative; cursor:pointer; margin-top: 20px; padding-right:5px; font-size: 30px; border-right: 3px solid black; color: white; " class="fab fa-facebook rede"></i></a>
                    <a target="blanck" href="https://www.instagram.com/021festas.eventos/" ><i style=" position:relative; text-align: center; cursor:pointer; margin-top: 20px; font-size: 30px; color: white;"  class="fab fa-instagram-square rede"></i></a>
            </div>

            <div class="footer-02">
                <h3>Atendimento ao cliente</h3>
                <div class="contatos">
                        <h3 style="color:white;" ><i style="color:blue;" class="fas fa-envelope"></i> Mande uma Mensagem!</h1>
                        <p style="color:white; font-size:18px; font-weight: normal " ><?php echo $infoSite['email'];?></p>
                </div><!--contatos-->

                <div class="contatos">
                        <h3 style="color:white;"><i style="color:red;" class="fas fa-phone-volume"></i>  Fale Conosco</h1>
                        <a style="color: white; text-decoration: none;" target="blank" href=" http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $infoSite['telefone'];?>" ><p style="color:white; font-weight: normal" ><i  style="color:green; font-size: 25px;" class="fab fa-whatsapp-square"></i> <?php echo $infoSite['telefone'];?></p></a>
                </div><!--contatos-->
            </div>
        </footer>
<script src="<?php echo INCLUDE_PATH;?>js/jquery.js" ></script>
<script src="<?php echo INCLUDE_PATH;?>js/sliders.js" ></script>
<script src="<?php echo INCLUDE_PATH;?>js/scrolltop.js" ></script>
<script src="<?php echo INCLUDE_PATH;?>js/icons-menu.js" ></script>
<script src="<?php echo INCLUDE_PATH;?>js/depoimento.js"></script>
<script src="<?php echo INCLUDE_PATH;?>js/jquery.magnific-popup.js"></script>
<script src="<?php echo INCLUDE_PATH;?>js/galeria.js"></script>

</body>
</html>