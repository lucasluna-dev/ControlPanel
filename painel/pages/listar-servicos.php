<?php 
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);//pegar a penas o numero 
        $selectServicos = database::conectar()->prepare("SELECT img FROM `tb_bufe.servicos` WHERE id = ? ");
        $selectServicos->execute(array($_GET['excluir']));
        $imagem = $selectServicos->fetch()['img'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_bufe.servicos',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
        
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 3;
    $servicos = Painel::selectAll('tb_bufe.servicos',($paginaAtual - 1) * $porPagina,$porPagina);
?>


<div class="box-content w100 left">
    <h2> <i class="far fa-file-alt"></i> Serviços Cadastrados</h2>
    <div class="wraper-table">
    <table>
        <tr>
            <th>Titulo</th>
            <th>Decrição</th>
            <th>Editar</th>
            <th>Deletar</th>
        <tr>

        <?php 
            foreach($servicos as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['titulo_servicos']; ?></td>
            <td><?php echo $value['subtitulo_servicos']; ?></td>
            <td><a class="btn edite" href="<?php echo INCLUDE_PATH_PAINEL;?>editar-servicos?id=<?php echo $value['id']?>"> Editar</a></td>
            <td><a actionbt="excluir" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-servicos?excluir=<?php echo $value['id']?>">Deletar</a></td>
        <tr>
        <?php } ?>
    </table>
    </div><!--wraper-table-->
    
    <div class="paginacao">
    <?php

        $totalPagina = ceil(count(Painel::selectAll('tb_bufe.servicos')) / $porPagina);
        for($i=1; $i<=$totalPagina; $i++){
            if($i == $paginaAtual){
                echo '<a class="pag-selectd" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
            }else{
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
            }
        }
    ?>
    </div><!--paginacao-->
</div><!--box-content-->