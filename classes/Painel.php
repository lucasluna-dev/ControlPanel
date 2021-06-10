<?php
    class Painel{ 

        public static $cargo = [
            '0'=>'Normal',  
            '1'=>'Sub Administrador',
            '2'=>'Admnistrador'];
        
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        } 

        public static function loggout(){
            setcookie('lembrar','true',time()-1,'/'); // detruir cookie
            session_destroy();
            header('Location: '.INLCUDE_PATH_PAINEL);
        }

        public static function pegaCargo($indice){
                return Painel::$cargo[$indice];
        }

        public static function CarregarPaginaHome(){
            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                    header('location: '.INCLUDE_PATH_PAINEL);
                }
            }else{
                include('pages/home.php');
            }
        }

        public static function ListarUsuarioOnline(){
            self::DeletarUsuarioOnline();
            $sql = database::conectar()->prepare("SELECT * FROM `tb_admin.online`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function DeletarUsuarioOnline(){
            $date = date('Y:m:d H:i:s');
            $sql = database::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' -  INTERVAL 1 MINUTE ");
        }

        public static function alert($tipo,$mensagem){  
            if($tipo == 'sucesso'){
                echo '<div class="mensagem"><i class="fas fa-check"></i> '.$mensagem.'</div>';
            }else if($tipo == 'erro'){
                echo '<div class="erro"><i class="fas fa-ban"></i> '.$mensagem.' <i class="fas fa-ban"></i></div>';
            }
        }

        public static function imagemValida($imagem){
            if($imagem['type'] == 'image/jpeg' ||
                $imagem['type'] == 'image/jpg' ||
                $imagem['type'] == 'image/png'){
                $tamanho = intval($imagem['size']/1024);
                if($tamanho < 300){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public static function uploadFile($file){
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/upload/'.$imagemNome)){
                return $imagemNome;
            }else{
                return false;
            }
        }

        public static function deleteFile($file){
            @unlink('upload/'.$file);
        }

        public static function testimunialInsert($nome,$depoimento,$order_id){
            $sql = database::conectar()->prepare("INSERT INTO `tb_clientes_depoimentos` VALUES (null,?,?,?)");
            if($sql->execute(array($nome,$depoimento,$order_id))){
            }
        }

        public static function updateOrderId(){
            $lastId = database::conectar()->lastInsertId(); // Pega o ultimo numero do id que foi incluido e passa para o order_id atualizando tudo e os dois ficando com o mesmo valor.
           $sql = database::conectar()->prepare("UPDATE `tb_clientes_depoimentos` SET order_id = ? WHERE id = $lastId");
           $sql->execute(array($lastId));
        }

        public static function servicosInsert($titulo_servicos,$subtitulos_servicos,$img,$conteudo,$order_id){
            $sql = database::conectar()->prepare("INSERT INTO `tb_bufe.servicos` VALUES (null,?,?,?,?,?)");
            $sql->execute(array($titulo_servicos,$subtitulos_servicos,$img,$conteudo,$order_id));
        }

        

        public static function updateOrderIdServicos(){
            $lastId = database::conectar()->lastInsertId(); // Pega o ultimo numero do id que foi incluido e passa para o order_id atualizando tudo e os dois ficando com o mesmo valor.
           $sql = database::conectar()->prepare("UPDATE `tb_bufe.servicos` SET order_id = ? WHERE id = $lastId");
           $sql->execute(array($lastId));
        }

        public static function cadastrarSlide($nome,$slide,$order_id){
            $sql = database::conectar()->prepare("INSERT INTO `tb_bufe.slides` VALUES (null,?,?,?)");
            $sql->execute(array($nome,$slide,$order_id));
        }

        public static function updateOrderIdSlide(){
            $lastId = database::conectar()->lastInsertId(); // Pega o ultimo numero do id que foi incluido e passa para o order_id atualizando tudo e os dois ficando com o mesmo valor.
            $sql = database::conectar()->prepare("UPDATE `tb_bufe.slides` SET order_id = ? WHERE id = $lastId");
            $sql->execute(array($lastId));
        }

        public static function imgServicosInsert($conteudp,$img,$order_id){
            $sql = database::conectar()->prepare("INSERT INTO `tb_bufe.galeria` VALUES (null,?,?,?)");
            $sql->execute(array($conteudp,$img,$order_id));
        }

        public static function updateOrderIdServicosImg(){
            $lastId = database::conectar()->lastInsertId(); // Pega o ultimo numero do id que foi incluido e passa para o order_id atualizando tudo e os dois ficando com o mesmo valor.
            $sql = database::conectar()->prepare("UPDATE `tb_bufe.galeria` SET order_id = ? WHERE id = $lastId");
            $sql->execute(array($lastId));
        }


        public static function selectAll($depoimento,$start = null,$end = null){
            if($start == null && $end == null)
            $sql = database::conectar()->prepare("SELECT * FROM `$depoimento` ORDER BY order_id ASC");

            else
            $sql = database::conectar()->prepare("SELECT * FROM `$depoimento` ORDER BY order_id ASC LIMIT $start,$end");

            $sql->execute();
            return $sql->fetchAll();
        }

        public static function deletar($tabela,$id=false){
            if($id == false){
                $sql = database::conectar()->prepare("DELETE FROM `$tabela`");
            }else{
                $sql = database::conectar()->prepare("DELETE FROM `$tabela` WHERE $id = id");
               
            }
            $sql->execute();

            
        }

        public static function redirect($url){
            echo '<script>location.href="'.$url.'"</script>';
            die();
        }

        public static function Select($table,$query,$array){
            $sql = database::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
            $sql->execute($array);
            return $sql->fetch();
        }

        public static function update($nome,$depoimento,$id){
            $sql = database::conectar()->prepare("UPDATE `tb_clientes_depoimentos` SET nome=?,depoimento=? WHERE id=?");
            $sql->execute(array($nome,$depoimento,$id));
        }

        public static function updateServicos($titulo_servicos,$subtitulo_servicos,$img,$conteudo,$id){
            $sql = database::conectar()->prepare("UPDATE `tb_bufe.servicos` SET titulo_servicos=?,subtitulo_servicos=?,img=?,conteudo=? WHERE id=?");
            $sql->execute(array($titulo_servicos,$subtitulo_servicos,$img,$conteudo,$id));
        }

        public static function updateSlide($nome,$slide,$id){
            $sql = database::conectar()->prepare("UPDATE `tb_bufe.slides` SET nome=?,slide=? WHERE id=?");
            $sql->execute(array($nome,$slide,$id));
        }

        public static function updateImgServicos($descricao,$img,$id){
            $sql = database::conectar()->prepare("UPDATE `tb_bufe.galeria` SET descricao=?,img=? WHERE id=?");
            $sql->execute(array($descricao,$img,$id));
        }
       
        public static function updateconfig($titulo_site, $telefone,$titulo_missao,$texto_missao,$imagem,$degustacao,$email,$cidade,$titulo_footer,$texto_footer){
            $sql = database::conectar()->prepare("UPDATE `tb_bufe.config` SET titulo_site=?, telefone=?,titulo_missao=?,texto_missao=?,img_missao=?,degustacao=?,email=?,cidade=?,titulo_footer=?,texto_footer=?");
            $sql->execute(array($titulo_site, $telefone,$titulo_missao,$texto_missao,$imagem,$degustacao,$email,$cidade,$titulo_footer,$texto_footer));
        }
        
        
    }//final do objeto PAINEL

    
?>