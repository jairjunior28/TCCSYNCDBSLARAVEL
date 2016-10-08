<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Parâmetros <a href="<?php echo e(url('/admin/parametros/create')); ?>" class="btn btn-primary pull-right btn-sm">Cadastrar novo Parâmetro</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th><?php echo e(trans('Configuração')); ?></th><th><?php echo e(trans('parametros.host')); ?></th><th><?php echo e(trans('parametros.usuario')); ?></th><th><?php echo e(trans('Banco')); ?></th><th><?php echo e(trans('Ações')); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php /* */$x=0;/* */ ?>
            <?php foreach($parametros as $item): ?>
                <?php /* */$x++;/* */ ?>
                <tr>
                    <td><?php echo e($x); ?></td>
                    <td><a href="<?php echo e(url('admin/parametros', $item->id)); ?>"><?php echo e($item->id_configuracao); ?></a></td><td><?php echo e($item->host); ?></td><td><?php echo e($item->usuario); ?></td><td><?php echo e($item->banco); ?></td>
                    <td>
                        <a href="<?php echo e(url('/admin/parametros/' . $item->id . '/edit')); ?>" class="btn btn-primary btn-xs">Atualizar</a>
                        <?php echo Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/parametros', $item->id],
                            'style' => 'display:inline'
                        ]); ?>

                            <?php echo Form::submit('Apagar', ['class' => 'btn btn-danger btn-xs']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination"> <?php echo $parametros->render(); ?> </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>