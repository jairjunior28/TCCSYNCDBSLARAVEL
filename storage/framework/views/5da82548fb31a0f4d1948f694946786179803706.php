<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Cadastrar nova configuração</h1>
    <hr/>

    <?php echo Form::open(['url' => '/admin/configuracoes', 'class' => 'form-horizontal']); ?>


                <div class="form-group <?php echo e($errors->has('titulo') ? 'has-error' : ''); ?>">
                <?php echo Form::label('titulo', trans('configuracoes.titulo'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <?php echo Form::text('titulo', null, ['class' => 'form-control', 'required' => 'required']); ?>

                    <?php echo $errors->first('titulo', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            <?php echo Form::submit('Cadastrar', ['class' => 'btn btn-primary form-control']); ?>

        </div>
    </div>
    <?php echo Form::close(); ?>


    <?php if($errors->any()): ?>
        <ul class="alert alert-danger">
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>