<?php
$this->breadcrumbs=array(
	'Condicion Pacientes'=>array('index'),
	$model->condicion_id,
);

$this->menu=array(
	array('label'=>'Listar Condiciones de Pacientes','url'=>array('index')),
	array('label'=>'Crear Condicion de Paciente','url'=>array('create')),
	array('label'=>'Actualizar Condicion de Paciente','url'=>array('update','id'=>$model->condicion_id)),
	//array('label'=>'Eliminar Condicion_paciente','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->condicion_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Condiciones de Pacientes','url'=>array('admin')),
);
?>

<h1>Ver Condicion de Paciente #<?php echo $model->condicion; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'condicion_id',
		'condicion',
	),
)); ?>
