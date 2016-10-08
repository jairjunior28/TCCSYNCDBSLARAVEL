<?php $__env->startSection('content'); ?>
    <?php $i=0;?>
<div class="container">

    <h1>Configurar vinculos de colunas das tabelas.</h1>
    <hr/>

    <?php echo Form::open(['url' => '/admin/tabelascolunas', 'class' => 'form-horizontal']); ?>




                        <div class="col-xs-3">
                        <input type="hidden" name="tabela1" value="<?php echo e($tabela[0]); ?>">

                                        <h2><?php echo e($tabela[0]); ?></h2>

                                       <?php foreach($colunas1 as $item): ?>

                                            <input type="hidden" name="idtabela1<?php echo e($i); ?>" value="<?php echo e($idtabela1); ?>">
                                            <input type="hidden" name="col<?php echo e($i++); ?>" value="<?php echo e($item); ?>">
                                            <label  class="btn btn-default" value="">  <?php echo e($tabela[0]); ?>.<?php echo e($item); ?></label>
                                           <br><hr/>

                                       <?php endforeach; ?>
                                </div>
                         <input type="hidden" value="<?php echo e($i); ?>" name="qtd">
                        <div class="col-xs-3">
                            <input type="hidden" name="tabela2" value="<?php echo e($tabela[1]); ?>">
                            <h2><?php echo e($tabela[1]); ?></h2>
                            <?php for($x=0;$x<$i;$x++): ?>
                                <input type="hidden" name="idtabela2<?php echo e($x); ?>" value="<?php echo e($idtabela2); ?>">
                                <select name="campo<?php echo e($x); ?>" class="form-control">
                                    <option value="0">Nenhum</option>
                                <?php foreach($colunas2 as $item): ?>


                                        <option value="<?php echo e($item); ?>">  <?php echo e($tabela[1]); ?>.<?php echo e($item); ?></option>

                                <?php endforeach; ?>
                                </select>
                                <hr/>
                            <?php endfor; ?>



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