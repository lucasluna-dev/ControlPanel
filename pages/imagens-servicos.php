
<main>
    <section class="img-servicos">
        <h2>Imagens dos nossos serviços</h2>
        <?php
            $sql = database::conectar()->prepare("SELECT * FROM `tb_bufe.galeria`");
            $sql->execute();
            $printarDescricao = $sql->fetchAll();
            foreach( $printarDescricao  as $key => $value){

        ?>
        <p><?php echo $value['descricao'];?></p>
        <?php } ?>
        
        <div class="center">
            <div class="container-poup">
            <?php 
                $puxarGaleria  = database::conectar()->prepare("SELECT * FROM `tb_bufe.galeria` ORDER BY order_id ASC");
                $puxarGaleria->execute();
                $printar  = $puxarGaleria->fetchAll();
                foreach($printar as $key => $value){
            ?>

               
                <a class="image-link" href="<?php echo INCLUDE_PATH; ?>./painel/upload/<?php echo $value['img'];?>"><img alt="Imagen de serviços <?php echo $infoSite['titulo_site'];?>" title="Imagen de serviços <?php echo $infoSite['titulo_site'];?> " src="<?php echo INCLUDE_PATH;?>./painel/upload/<?php echo $value['img'];?>"></a>
                
            <?php } ?>
            </div><!--container-->
            
        </div><!--center-->  
    </section><!--img-servicos-->
</main>