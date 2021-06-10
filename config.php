<?php
    session_start();
    date_default_timezone_set('America/Sao_paulo');
    $Autoload = function($class){

    include_once('classes/'.$class.'.php');
          
    };

    spl_autoload_register($Autoload);
    

    define('INCLUDE_PATH','');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');


    define('BASE_DIR_PAINEL',__DIR__.'/painel');

    define('NAME_HOME','021 Fetas e eventos');

    define('HOST','');
    define('DATABASE','');
    define('USER','');
    define('PASSWORD','');

    function selecionadoMenu($par){
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par){
            echo 'class="menu-active";';
        }
    }

    function verificarPermissaoMenu($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            echo'style="display:none;"';
        }
    }

    function verificarPermissaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            include('painel/pages/acesso-negado.php');
            die();
        }
    }

    //podemos acessar esse arquivo em todo os lugares.
?>