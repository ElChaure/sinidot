<?php
$this->breadcrumbs=array(
	'Estatus Pacs'=>array('index'),
	$model->estatus_id,
);

$this->menu=array(
	array('label'=>'Listar Estatus de Pacientes','url'=>array('index')),
	array('label'=>'Crear Estatus de Paciente','url'=>array('create')),
	array('label'=>'Actualizar Estatus de Paciente','url'=>array('update','id'=>$model->estatus_id)),
	//array('label'=>'Eliminar Estatus_pac','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->estatus_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Estatus de Pacientes','url'=>array('admin')),
);
?>

<h1>Ver Estatus de Paciente: <?php echo $model->estatus; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'estatus_id',
		'estatus',
	),
)); ?>
