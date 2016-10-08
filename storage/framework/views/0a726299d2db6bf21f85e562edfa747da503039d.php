<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Configuração</h1>
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