<?php
$this->breadcrumbs=array(
	'Examenes'=>array('index'),
	$model->examen_id,
);

$this->menu=array(
	//array('label'=>'List Examenes','url'=>array('index')),
	//array('label'=>'Create Examenes','url'=>array('create')),
	//array('label'=>'Update Examenes','url'=>array('update','id'=>$model->examen_id)),
	//array('label'=>'Delete Examenes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->examen_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Examenes','url'=>array('admin')),
        array('label'=>'Regresar','url'=>array('pacientes/view','id'=>$model->paciente_id)),
);
?>

<h1>Ver Examen #<?php echo $model->examen_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'examen_id',
		'paciente_id',
		'fecha_examen',
		array(
		'name'=>'aghbs',
		'value'=>Posinega::model()->buscaValor($model->aghbs),
		),
		array(
		'name'=>'anticore',
		'value'=>Posinega::model()->buscaValor($model->anticore),
		),		
		array(
		'name'=>'hvc',
		'value'=>Posinega::model()->buscaValor($model->hvc),
		),				
		array(
		'name'=>'acaghbs',
		'value'=>Posinega::model()->buscaValor($model->acaghbs),
		),						
	),
)); ?>
