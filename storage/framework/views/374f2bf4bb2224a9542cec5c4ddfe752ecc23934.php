<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Cadastrar nova Tabela</h1>
    <hr/>

    <?php echo Form::open(['url' => '/admin/tabelas', 'class' => 'form-horizontal']); ?>


                <div class="form-group <?php echo e($errors->has('id_configuracao') ? 'has-error' : ''); ?>">
                <?php echo Form::label('id_configuracao', trans('tabelas.id_configuracao'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <?php echo Form::select('id_configuracao',$configuracoes::lists('titulo','id') , ['class' => 'form-control', 'required' => 'required','id'=>'id_configuracao']); ?>


                    <?php echo $errors->first('id_configuracao', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('id_parametro') ? 'has-error' : ''); ?>">
                <?php echo Form::label('id_parametro', trans('Host/Banco'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6" >

                    <select name="id_parametro" class="form-control"  id="id_parametro" required="required">
                        <option >Selecione...</option>
                        <?php foreach($parametros->all() as $item): ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->host); ?>/<?php echo e($item->banco); ?></option>

                        <?php endforeach; ?>
                    </select>





                    <?php echo $errors->first('id_parametro', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>



    <?php /*print_r($param)*/ ?>
            <div class="form-group <?php echo e($errors->has('nome') ? 'has-error' : ''); ?>">

                <?php echo Form::label('nome', trans('tabelas.nome'), ['class' => 'col-sm-3 control-label']); ?>

                <div class="col-sm-6">
                    <select name="nome" id="nome" class="form-control" required="required">
                        <option value="">Selecione...</option>
                    </select>

                    <?php echo $errors->first('nome', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script>
        $('#id_parametro').change(function (e) {
            console.log(e);
            var id_parametro=e.target.value;
            $.get('/ajax-tabela?id_parametro='+id_parametro, function (data) {
                $('#nome').empty();
               $.each(data, function(index,idtabelaObj){
                  $('#nome').append('<option value="'+idtabelaObj[0]+'">'+idtabelaObj[0]+'</option>');

               });

                console.log(data);


            });
        });
    </script>
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