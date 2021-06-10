<?php 
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);//pegar a penas o numero 
        $selectSlide = database::conectar()->prepare("SELECT slide FROM `tb_bufe.slides` WHERE id = ? ");
        $selectSlide->execute(array($_GET['excluir']));
        $imagem = $selectSlide->fetch()['slide'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_bufe.slides',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
        
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 3;
    $slides = Painel::selectAll('tb_bufe.slides',($paginaAtual - 1) * $porPagina,$porPagina);
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
            foreach($slides  as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><img style="width:50px; height:50px;" src="<?php echo INCLUDE_PATH_PAINEL;?>upload/<?php echo $value['slide']?>"></td>
            <td><a class="btn edite" href="<?php echo INCLUDE_PATH_PAINEL;?>editar-slides?id=<?php echo $value['id']?>"> Editar</a></td>
            <td><a actionbt="excluir" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-slides?excluir=<?php echo $value['id']?>">Deletar</a></td>
        <tr>
        <?php } ?>
    </table>
    </div><!--wraper-table-->
    
    <div class="paginacao">
    <?php

        $totalPagina = ceil(count(Painel::selectAll('tb_bufe.slides')) / $porPagina);
        for($i=1; $i<=$totalPagina; $i++){
            if($i == $paginaAtual){
                echo '<a class="pag-selectd" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
            }else{
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
            }
        }
    ?>
    </div><!--paginacao-->
</div><!--box-content-->