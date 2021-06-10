<section class="header-servicos">
   
        <h3 style="">Nossos Serviços</h3>
    
</section><!--servicos-->

<section class="page-servicos">
    <div class="center">
        
        <?php
            $sql = database::conectar()->prepare("SELECT * FROM `tb_bufe.servicos`");
            $sql->execute();
            $retunrImage = $sql->fetchAll();
            foreach($retunrImage as $key => $value){
            
        ?>
        <hr>
        <div  class="content-all">

            <div class="img-cardapio left">
            <img alt="Imagens do Cardápio <?php echo $infoSite['titulo_site'];?>" title="Imagens do Cardápio <?php echo $infoSite['titulo_site'];?>" src="<?php echo INCLUDE_PATH;?>./painel/upload/<?php echo $value['img'];?>">
            </div><!--img-cardapio-->

            <div class="lista-cardapio right"> 
            <h2><?php  echo $value['titulo_servicos'];?></h2>
            <p><?php echo $value['conteudo']?></p>
            </div><!--lista-cardapio-->
          
            <div class="clear"></div>

        </div><!--content-All-->
        <hr>
        <?php } ?>
    </div><!--center-->
</section><!--page-servicos-->