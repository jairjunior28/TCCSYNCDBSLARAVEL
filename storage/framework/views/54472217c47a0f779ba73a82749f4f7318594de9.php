<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Tabelascolunas </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th><?php echo e(trans('tabelascolunas.id_tabela1')); ?></th><th><?php echo e(trans('tabelascolunas.id_tabela2')); ?></th><th><?php echo e(trans('tabelascolunas.coluna1')); ?></th><th><?php echo e(trans('tabelascolunas.coluna2')); ?></th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php /* */$x=0;/* */ ?>
            <?php foreach($tabelascolunas as $item): ?>
                <?php /* */$x++;/* */ ?>
                <tr>
                    <td><?php echo e($x); ?></td>
                    <td><a href="<?php echo e(url('admin/tabelascolunas', $item->id)); ?>"><?php echo e($item->id_tabela1); ?></a></td><td><?php echo e($item->id_tabela2); ?></td>
                    <td><?php echo e($item->coluna1); ?></td><td><?php echo e($item->coluna2); ?></td>
                    <td>
                        <a href="<?php echo e(url('/admin/tabelascolunas/' . $item->id . '/edit')); ?>" class="btn btn-primary btn-xs">Update</a>
                        <?php echo Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/tabelascolunas', $item->id],
                            'style' => 'display:inline'
                        ]); ?>

                            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination"> <?php echo $tabelascolunas->render(); ?> </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>