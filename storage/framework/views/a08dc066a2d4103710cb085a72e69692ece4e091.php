<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Tabelas <a href="<?php echo e(url('/admin/tabelas/create')); ?>" class="btn btn-primary pull-right btn-sm">Cadastrar Nova Tabela</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th><?php echo e(trans('tabelas.id_configuracao')); ?></th><th><?php echo e(trans('tabelas.id_parametro')); ?></th><th><?php echo e(trans('tabelas.nome')); ?></th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php /* */$x=0;/* */ ?>
            <?php foreach($tabelas as $item): ?>
                <?php /* */$x++;/* */ ?>
                <tr>
                    <td><?php echo e($x); ?></td>
                    <td><a href="<?php echo e(url('admin/tabelas', $item->id)); ?>"><?php echo e($item->id_configuracao); ?></a></td><td><?php echo e($item->id_parametro); ?></td><td><?php echo e($item->nome); ?></td>
                    <td>
                        <a href="<?php echo e(url('/admin/tabelas/' . $item->id . '/edit')); ?>" class="btn btn-primary btn-xs">Atualizar</a>
                        <?php echo Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/tabelas', $item->id],
                            'style' => 'display:inline'
                        ]); ?>

                            <?php echo Form::submit('Apagar', ['class' => 'btn btn-danger btn-xs']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination"> <?php echo $tabelas->render(); ?> </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>