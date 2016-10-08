<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Configurações <a href="<?php echo e(url('/admin/configuracoes/create')); ?>" class="btn btn-primary pull-right btn-sm">Cadastrar nova Configuraco</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th><?php echo e(trans('configuracoes.titulo')); ?></th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php /* */$x=0;/* */ ?>
            <?php foreach($configuracoes as $item): ?>
                <?php /* */$x++;/* */ ?>
                <tr>
                    <td><?php echo e($x); ?></td>
                    <td><a href="<?php echo e(url('admin/configuracoes', $item->id)); ?>"><?php echo e($item->titulo); ?></a></td>
                    <td>
                        <a href="<?php echo e(url('/admin/configuracoes/' . $item->id . '/edit')); ?>" class="btn btn-primary btn-xs">Atualizar</a>
                        <?php echo Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/configuracoes', $item->id],
                            'style' => 'display:inline'
                        ]); ?>

                            <?php echo Form::submit('Apagar', ['class' => 'btn btn-danger btn-xs']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination"> <?php echo $configuracoes->render(); ?> </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>