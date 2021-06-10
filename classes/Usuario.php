<?php

    class Usuario{
        public function atualizarUsuario($nome,$password,$imagem){
            $sql = database::conectar()->prepare("UPDATE `bufe_admin.usuarios` SET nome = ?, password = ?, img = ? WHERE user = ?");
            if($sql->execute(array($nome,$password,$imagem,$_SESSION['user']))){
                return true;
            }else{
                return false;
            }
        }

        public function userExists($user){
            $sql = database::conectar()->prepare("SELECT 'id' FROM `bufe_admin.usuarios` WHERE user=?");
            $sql->execute(array($user));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }
        
        public static function cadastrarUser($login,$password,$imagem,$nome,$cargo){
            $sql = database::conectar()->prepare("INSERT INTO `bufe_admin.usuarios` VALUE (null,?,?,?,?,?)");
            $sql->execute(array($login,$password,$imagem,$nome,$cargo));
        }

        public static function usuarioPainel(){
            $sql = database::conectar()->prepare("SELECT * FROM `bufe_admin.usuarios`");
            $sql->execute();
            return $sql->fetchAll();
        }
    }
?>