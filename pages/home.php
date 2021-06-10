

    <!--PRIMEIRO SLIDER DO SITE-->
 <section  id="home" class="session-slider"> 
                <?php
                    $sql = database::conectar()->prepare("SELECT * FROM `tb_bufe.slides`");
                    $sql->execute();
                    $retunrImage = $sql->fetchAll();
                    foreach($retunrImage as $key => $value){
                    
                ?>
                <div class="banner-single"><img alt="Imagen de serviços <?php echo $infoSite['titulo_site'];?>" title="Imagen de serviços <?php echo $infoSite['titulo_site'];?> " src="<?php echo INCLUDE_PATH;?>./painel/upload/<?php echo $value['slide'];?>"></div>
                <div class="overlay"></div><!--overlay-->
                <?php } ?>
        </section><!--sessao-slider-->
        <div class="clear" ></div>

        <section id="nossa_empresa" class="sobre-author">
            <div class="center">
                
                <h1>Nossa Empresa</h1>
                <div class="img-author left"><img alt="Logo <?php echo $infoSite['titulo_site'];?>" title="Logo <?php echo $infoSite['titulo_site'];?> " src="<?php echo INCLUDE_PATH;?>./painel/upload/<?php echo $infoSite['img_missao'];?>"></div>
                <div class="clear"></div>
                
                
                <div class="conteudo-sobre right">
                    <h2><b><?php echo $infoSite['titulo_missao'];?></b></h2>
                <p><b><?php echo $infoSite['texto_missao'];?></b></p>
                </div><!--conteudo-sobre-->
                <div class="clear"></div>
            </div><!--center-->
        </section><!--sobre-author-->

        
        
        <section id="servicos" class="container-servicos">
            <div class="center">
                <h1>Nossos servicos</h1>
                <div class="box-pai">
                <div class="box-wraper">
                
                
                <?php 
                    $sql = database::conectar()->prepare("SELECT * FROM `tb_bufe.servicos` ORDER BY order_id ASC");
                    $sql->execute();
                    $conteudo = $sql->fetchAll();             
                      
                    foreach($conteudo as $key => $value){     
                    
                ?>

                <div class="box-servicos ">
                
                    <a><img alt="Imagen de serviços <?php echo $infoSite['titulo_site'];?>" title="Imagen de serviços <?php echo $infoSite['titulo_site'];?> " src="<?php echo INCLUDE_PATH;?>./painel/upload/<?php echo $value['img'];?>"></a>
                    <div class="box-info">
                        <h2><?php  echo $value['titulo_servicos'];?></h2>
                        <p><?php echo $value['subtitulo_servicos'];?></p>
                        <div class="bnt-orcamento01"><a style="text-decoration:none;"  href="<?php echo INCLUDE_PATH;?>page-servicos"><span>Clique aqui para ver o cardapio</span></a></div>    
                    </div><!--box-info-->
                    
                </div><!--box-servicos-->
                <?php } ?>
               
                    </div><!--box-wraper-->
                    </div><!--box-pai-->
                <div class="clear"></div>
            </div><!--center-->
        </section><!--container-servicos-->

        <section class="container-degustacao">
            <div class="center">
                <div class="boxs-desgustcao">
                    <img src="<?php echo INCLUDE_PATH;?>./imagens/img-desgustacao.png" class="img-degustcao left">
                   
                    <div class="conteudo-degustacao right">
                        <p><b><?php echo $infoSite['degustacao'];?></b></p>
                    <h2  style=" position:absolute; margin-top:10px; color: yellow;">Siga as nossas redes sociais!!</h2>
                    <a target="blanck" href="https://www.facebook.com/021festaseeventos/" ><i style=" position:relative; cursor:pointer; margin-top: 40px; padding-right:5px; font-size: 40px; border-right: 3px solid black; color: #3b5998; " class="fab fa-facebook rede"></i></a>
                    <a target="blanck" href="https://www.instagram.com/021festas.eventos/" ><i style=" position:relative; text-align: center; cursor:pointer; margin-top: 40px; font-size: 40px; color: rgb(71, 0, 71);"  class="fab fa-instagram-square rede"></i></a>
                        
                    </div><!--conteudo desgutacao-->
                   
                    <div class="clear"></div>
                    
                </div><!--box-degustcao-->              
            </div><!--center-->
        </section><!--container-degustacao-->
        <div class="clear"></div>

        <!--SESSAO CONTATO E DEPOIMENTO-->
           
        <section id="contato" class="sessao-cd">
            <div class="center">
               

                <div class="parte2-depoimento w50 left" >
                    <h1>Depoimento de Alguns clientes</h1>
                    <div class="scroll-cliente">
                        <div class="scroll-wraper">

                        <?php 
                            $sql = database::conectar()->prepare("SELECT * FROM `tb_clientes_depoimentos` ORDER BY order_id ASC");
                            $sql->execute();
                            $sliderDpoimento = $sql->fetchAll();

                            foreach($sliderDpoimento as $key => $value){
                        
                        ?>
                        <div class="sobre-cliente">
                                
                                <div class="titulo-author">
                                    <h2><?php echo $value['nome'];?></h2>
                                    <!--<div class="img-cliente"></div>img-cliente-->
                                </div><!--titulo-author-->
                                
                                <div class="texto-author">
                                    <p><b><?php echo $value['depoimento'];?></b></p>
                                </div><!--texto-author-->
                        </div><!--sobre-cliente-->
                        <?php } ?>
                        
                    </div><!--scroll-wraper-->
                    </div><!--scroll-cliente-->
                   <div class="slider-bullets">
                       
                   </div><!--slider-bullets-->
                </div><!--parte-2-->
                
                <div class="parte1-form w50 right">
                    <h1>Fale Conosco</h1>
                    <div class="contatos">
                        <h3><i style="color:blue;" class="fas fa-envelope"></i> Mande uma Mensagem!</h1>
                        <p><?php echo $infoSite['email'];?></p>
                    </div><!--contatos-->
                    <div class="contatos">
                        <h3> <i style="color:#ffe700;" class="fas fa-map-marked-alt"></i> Atendemos em:</h1>
                        <p><?php echo $infoSite['cidade'];?></p>
                    </div><!--contatos-->
                    <div class="contatos">
                        <h3><i style="color:red;" class="fas fa-phone-volume"></i>  Fale Conosco</h1>
                        <a style="color: white; text-decoration: none;" target="blank" href=" http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $infoSite['telefone'];?>" ><p><i  style="color:green; font-size: 25px;" class="fab fa-whatsapp-square"></i> <?php echo $infoSite['telefone'];?></p></a>
                    </div><!--contatos-->
                    
            </div><!--center-->
            <div class="clear"></div>
        </section><!--sessao-cd-->



        <section class="print-depoimento">
            <div class="center">
                <div class="print-conteudo">
                    <h2>Veja o que nossos clientes acham da 021 Festas e Eventos!</h2>
                    <p></p>
                    <div class="print-imagens">
                        <img alt="Depoimentos da <?php echo $infoSite['titulo_site'];?>" title="Depoimentos da <?php echo $infoSite['titulo_site'];?> " src="./imagens/print-bufe01.jpeg">
                    </div><!--print-imagens-->

                    <div class="print-imagens">
                        <img alt="Depoimentos da <?php echo $infoSite['titulo_site'];?>" title="Depoimentos da <?php echo $infoSite['titulo_site'];?> " src="./imagens/print-bufe-02.jpeg">
                    </div><!--print-imagens-->

                    <div class="print-imagens">
                        <img alt="Depoimentos da <?php echo $infoSite['titulo_site'];?>" title="Depoimentos da <?php echo $infoSite['titulo_site'];?> " src="./imagens/print-bufe-03.jpeg">
                    </div><!--print-imagens-->

                    <div class="print-imagens">
                        <img alt="Depoimentos da <?php echo $infoSite['titulo_site'];?>" title="Depoimentos da <?php echo $infoSite['titulo_site'];?> " src="./imagens/print-bufe-04.jpeg">
                    </div><!--print-imagens-->



                    
                    <div class="clear"></div>
            </div><!--center-->
        <section><!--print-depoimento-->