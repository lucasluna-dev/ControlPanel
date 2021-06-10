<?php
    class Site{
        public static function UpdateUsuarioOnline(){
            if(isset($_SESSION['online'])){
                $token = $_SESSION['online'];
                $horario_atual = date('Y:m:d H:i:s');
                $check = database::conectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
                $check->execute(array($_SESSION['online']));

                if($check->rowCount() == 1){
                    $sql = database::conectar()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?");
                    $sql->execute(array($token,$horario_atual));
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $token = $_SESSION['online'];
                    $horario_atual = date('Y:m:d H:i:s');
                    $sql = database::conectar()->prepare("INSERT INTO  `tb_admin.online` VALUES (NULL,?,?,?)");
                    $sql->execute(array($ip,$horario_atual,$token));
                }
                
            }else{
                $_SESSION['online'] = uniqid();
                $ip = $_SERVER['REMOTE_ADDR'];
                $token = $_SESSION['online'];
                $horario_atual = date('Y:m:d H:i:s');
                $sql = database::conectar()->prepare("INSERT INTO  `tb_admin.online` VALUES (NULL,?,?,?)");
                $sql->execute(array($ip,$horario_atual,$token));
            }
        }

        public static function contador(){  
            if(!isset($_COOKIE['visitas'])){
                setcookie('visitas','true',time() + (60*60*24*7));
                $sql = database::conectar()->prepare("INSERT INTO `tb_admin.visitas` VALUES (null,?,?)");
                $sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y:m:d')));
            }
        }
    }
    
?>