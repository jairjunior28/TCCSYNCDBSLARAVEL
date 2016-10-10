<?php $__env->startSection('content'); ?>
<body onload="processaBasico();">
    <script language="javascript">
        function processaBasico() {
            var w = parseInt(document.getElementById('barraProgressoBasico').style.width);
            var i = w + 1;
            document.getElementById('barraProgressoBasico').style.width= (i) +'%';
            $("#barraProgressoBasico").html(i+'%');

            if(i<100) {
                if(i==60)
                    $("#barraProgressoBasico").removeClass().addClass('progress-bar progress-bar-warning');
                if(i==80)
                    $("#barraProgressoBasico").removeClass().addClass('progress-bar progress-bar-danger');
                setTimeout('processaBasico()', 100);

            }
            else{$("#barraProgressoBasico").removeClass().addClass('progress-bar progress-bar-success');
                $("#barraProgressoBasico").html('Sincronização concluída!');
                $("#andamento").html('Sincronização concluída!')

            };
        }
    </script>
<div class="container" >

    <h1>Configuração</h1>
    <label id="andamento">Andamento da sincronização:</label>
    <div class="progress progress-striped active">

        <div id="barraProgressoBasico" class="progress-bar progress-bar-info" style="width: 0%;">0%</div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th><?php echo e(trans('configuracoes.titulo')); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($configuraco->id); ?></td> <td> <?php echo e($configuraco->titulo); ?> </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>