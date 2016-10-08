<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Vinculotabelas <a href="<?php echo e(url('/admin/vinculotabelas/create')); ?>" class="btn btn-primary pull-right btn-sm">Adicionar Novo Vínculo de tabela</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th><?php echo e(trans('vinculotabelas.id_tabela1')); ?></th><th><?php echo e(trans('vinculotabelas.id_tabela2')); ?></th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php /* */$x=0;/* */ ?>
            <?php foreach($vinculotabelas as $item): ?>
                <?php /* */$x++;/* */ ?>
                <tr>
                    <td><?php echo e($x); ?></td>
                    <td><a href="<?php echo e(url('admin/vinculotabelas', $item->id)); ?>"><?php echo e($item->id_tabela1); ?></a></td><td><?php echo e($item->id_tabela2); ?></td>
                    <td>
                        <a href="<?php echo e(url('/admin/vinculotabelas/' . $item->id . '/edit')); ?>" class="btn btn-primary btn-xs">Atualizar</a>
                        <a href="<?php echo e(url('/admin/tabelascolunas/create?idvtabela=' . $item->id )); ?>" class="btn btn-primary btn-xs">Vincular Colunas</a>
                        <?php echo Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/vinculotabelas', $item->id],
                            'style' => 'display:inline'
                        ]); ?>

                            <?php echo Form::submit('Apagar', ['class' => 'btn btn-danger btn-xs']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination"> <?php echo $vinculotabelas->render(); ?> </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>