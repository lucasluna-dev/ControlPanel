<?php 
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);//pegar a penas o numero 
        Painel::deletar('tb_clientes_depoimentos',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimento');
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 3;
    $depoimentos = Painel::selectAll('tb_clientes_depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);
?>


<div class="box-content w100 left">
    <h2> <i class="far fa-file-alt"></i> Depoimentos Cadastrados</h2>
    <div class="wraper-table">
    <table>
        <tr>
            <th>Nome</th>
            <th>Depoimentos</th>
            <th>Editar</th>
            <th>Deletar</th>
        <tr>

        <?php 
            foreach($depoimentos as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><?php echo $value['depoimento']; ?></td>
            <td><a class="btn edite" href="<?php echo INCLUDE_PATH_PAINEL;?>editar-depoimentos?id=<?php echo $value['id']?>"> Editar</a></td>
            <td><a actionbt="excluir" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-depoimento?excluir=<?php echo $value['id']?>"> Deletar</a></td>
        <tr>
        <?php } ?>
    </table>
    </div><!--wraper-table-->
    
    <div class="paginacao">
    <?php

        $totalPagina = ceil(count(Painel::selectAll('tb_clientes_depoimentos')) / $porPagina);
        for($i=1; $i<=$totalPagina; $i++){
            if($i == $paginaAtual){
                echo '<a class="pag-selectd" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
            }else{
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimento?pagina='.$i.'">'.$i.'</a>';
            }
        }
    ?>
    </div><!--paginacao-->
</div><!--box-content-->