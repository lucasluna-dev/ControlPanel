<?php 
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);//pegar a penas o numero 
        $selectSlide = database::conectar()->prepare("SELECT img FROM `tb_bufe.galeria` WHERE id = ? ");
        $selectSlide->execute(array($_GET['excluir']));
        $imagem = $selectSlide->fetch()['img'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_bufe.galeria',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-galeria');
        
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 3;
    $galeria = Painel::selectAll('tb_bufe.galeria',($paginaAtual - 1) * $porPagina,$porPagina);
?>


<div class="box-content w100 left">
    <h2> <i class="far fa-file-alt"></i> Slides Cadastrados</h2>
    <div class="wraper-table">
    <table>
        <tr>
            <th>Titulo</th>
            <th>Imagem</th>
            <th>Editar</th>
            <th>Deletar</th>
        <tr>

        <?php 
            foreach($galeria  as $key => $value){
        ?>
        <tr>
            <td>foto de numero <?php echo $value['id']; ?></td>
            <td><img style="width:50px; height:50px;" src="<?php echo INCLUDE_PATH_PAINEL;?>upload/<?php echo $value['img']?>"></td>
            <td><a class="btn edite" href="<?php echo INCLUDE_PATH_PAINEL;?>editar-galeria?id=<?php echo $value['id']?>">Editar</a></td>
            <td><a actionbt="excluir" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-galeria?excluir=<?php echo $value['id']?>"> Deletar</a></td>
        <tr>
        <?php } ?>
    </table>
    </div><!--wraper-table-->
    
    <div class="paginacao">
    <?php

        $totalPagina = ceil(count(Painel::selectAll('tb_bufe.galeria')) / $porPagina);
        for($i=1; $i<=$totalPagina; $i++){
            if($i == $paginaAtual){
                echo '<a class="pag-selectd" href="'.INCLUDE_PATH_PAINEL.'listar-galeria?pagina='.$i.'">'.$i.'</a>';
            }else{
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-galeria?pagina='.$i.'">'.$i.'</a>';
            }
        }
    ?>
    </div><!--paginacao-->
</div><!--box-content-->