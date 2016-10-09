<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Edit Vinculotabela</h1>
    <hr/>

    <?php echo Form::model($vinculotabela, [
        'method' => 'PATCH',
        'url' => ['/admin/vinculotabelas', $vinculotabela->id],
        'class' => 'form-horizontal'
    ]); ?>


                <div class="form-group <?php echo e($errors->has('id_tabela1') ? 'has-error' : ''); ?>">
                <?php echo Form::label('id_tabela1', trans('vinculotabelas.id_tabela1'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <?php echo Form::select('id_tabela1',$tabela::lists('nome','id') , ['class' => 'form-control', 'required' => 'required','id'=>'id_configuracao','value'=>$tabela->id]); ?>

                    <?php echo $errors->first('id_tabela1', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('id_tabela2') ? 'has-error' : ''); ?>">
                <?php echo Form::label('id_tabela2', trans('vinculotabelas.id_tabela2'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <?php echo Form::select('id_tabela2',$tabela::lists('nome','id') , ['class' => 'form-control', 'required' => 'required','id'=>'id_configuracao','value'=>$tabela->id]); ?>

                    <?php echo $errors->first('id_tabela2', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            <?php echo Form::submit('Update', ['class' => 'btn btn-primary form-control']); ?>

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