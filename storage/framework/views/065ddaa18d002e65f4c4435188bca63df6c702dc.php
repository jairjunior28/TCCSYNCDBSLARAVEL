<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Cadastrar novo Parâmetro</h1>
    <hr/>

    <?php echo Form::open(['url' => '/admin/parametros', 'class' => 'form-horizontal']); ?>


                <div class="form-group <?php echo e($errors->has('id_configuracao') ? 'has-error' : ''); ?>">
                <?php echo Form::label('id_configuracao', trans('parametros.id_configuracao'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">

                    <?php echo Form::select('id_configuracao',$configuracoes::lists('titulo','id') , ['class' => 'form-control', 'required' => 'required']); ?>

                    <?php echo $errors->first('id_configuracao', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('host') ? 'has-error' : ''); ?>">
                <?php echo Form::label('host', trans('parametros.host'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <?php echo Form::text('host', null, ['class' => 'form-control', 'required' => 'required']); ?>

                    <?php echo $errors->first('host', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('usuario') ? 'has-error' : ''); ?>">
                <?php echo Form::label('usuario', trans('parametros.usuario'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <?php echo Form::text('usuario', null, ['class' => 'form-control', 'required' => 'required']); ?>

                    <?php echo $errors->first('usuario', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('senha') ? 'has-error' : ''); ?>">
                <?php echo Form::label('senha', trans('parametros.senha'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <?php echo Form::text('senha', null, ['class' => 'form-control']); ?>

                    <?php echo $errors->first('senha', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('banco') ? 'has-error' : ''); ?>">
                <?php echo Form::label('banco', trans('parametros.banco'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <?php echo Form::text('banco', null, ['class' => 'form-control', 'required' => 'required']); ?>

                    <?php echo $errors->first('banco', '<p class="help-block">:message</p>'); ?>

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