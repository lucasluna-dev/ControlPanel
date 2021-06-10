   <?php  
        $usuarioOnline = Painel::ListarUsuarioOnline(); 
        
        $pegarVisitasTotal = database::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
        $pegarVisitasTotal->execute();
        $pegarVisitasTotal = $pegarVisitasTotal->rowCount();
    
        $pegarVisitasHoje = database::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
        $pegarVisitasHoje->execute(array(date('Y:m:d')));
        $pegarVisitasHoje = $pegarVisitasHoje->rowCount();
    
   ?>
    <div class="box-content left w100">
            <h2> <i class="fa fa-home"></i> Painel de controle - <?php echo NAME_HOME; ?></h2>
            <div class="box-metricas">
                <div class="metricas-single m0">
                    <div class="box-metricas-wraper">
                    <h2>Usuario Online</h2>
                    <p> <?php echo count($usuarioOnline); ?> </p>
                    </div><!--box-metrricas-wraper-->
                </div><!--metricas-single-->

                <div class="box-metricas">
                <div class="metricas-single m1">
                    <div class="box-metricas-wraper">  
                    <h2>Total de Visitas</h2>
                    <p> <?php echo $pegarVisitasTotal; ?> </p>
                    </div><!--box-metrricas-wraper-->
                </div><!--metricas-single-->

                <div class="box-metricas">
                <div class="metricas-single m2">
                    <div class="box-metricas-wraper">
                    <h2>Visitas Hoje</h2>
                    <p> <?php echo $pegarVisitasHoje; ?> </p>
                    </div><!--box-metrricas-wraper-->
                </div><!--metricas-single-->
                <div class="clear"></div>
            </div><!--box-metricass-->
    </div><!--box-content-->


<div class="box-content left w100">
        <h2> <i class="fas fa-user-friends"></i> Usuarios Online</h2>

        <div class="table-responsive">
            <div class="row">
                <div style=" border-bottom  : 2px solid green;" class="col">
                    <span>IP<span>
                </div><!--col-->
                <div style=" border-bottom: 2px solid green;" class="col">
                    <span>última Ação<span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->

            <?php foreach($usuarioOnline as $key => $value){ ?>
            <div class="row">
                <div class="col">
                    <span> <?php echo $value['ip']; ?> <span>
                </div><!--col-->
                <div class="col">
                    <span> <?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])); ?> <span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            <?php } ?>
        </div><!--tabela-responsiva-->
    
    <div class="box-conteudo">
        <h2> <i class="fas fa-user-friends"></i> Usuarios do painel</h2>

        <div class="table-responsive">
            <div class="row">
                <div style=" border-bottom: 2px solid orange;" class="col">
                    <span>Nome<span>
                </div><!--col-->
                <div style=" border-bottom: 2px solid orange;" class="col">
                    <span>Cargo<span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->

            <?php 
                $usuarioPainel = Usuario::usuarioPainel();
                foreach($usuarioPainel as $key => $value){
            ?>
            <div class="row">
                <div class="col">
                    <span> <?php echo $value['nome']; ?> <span>
                    
                </div><!--col-->
               
                <div class="col">
                    <span> <?php echo Painel::pegaCargo($value['cargo']);?> <span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            <hr>
            <?php } ?>
        </div><!--tabela-responsiva-->
    </div><!--box- conteudo-->
</div><!--box-content-->


        <!--/////////////////////////////////////////
                separação de tabelas
        -->

        

