<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->rol_id,
);

$this->menu=array(
	array('label'=>'Listar Roles','url'=>array('index')),
	array('label'=>'Crear Roles','url'=>array('create')),
	array('label'=>'Actualizar Roles','url'=>array('update','id'=>$model->rol_id)),
	//array('label'=>'Eliminar Roles','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->rol_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Roles','url'=>array('admin')),
);
?>

<h1>Ver Roles #<?php echo $model->rol_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'rol_id',
		'rol',
	),
)); ?>
