<?php
$this->breadcrumbs=array(
	'Estatus Dons'=>array('index'),
	$model->estatus_id,
);

$this->menu=array(
	array('label'=>'Listar Estatus_don','url'=>array('index')),
	array('label'=>'Crear Estatus_don','url'=>array('create')),
	array('label'=>'Actualizar Estatus_don','url'=>array('update','id'=>$model->estatus_id)),
	//array('label'=>'Eliminar Estatus_don','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->estatus_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Estatus_don','url'=>array('admin')),
);
?>

<h1>Ver Estatus_don #<?php echo $model->estatus_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'estatus_id',
		'estatus',
	),
)); ?>
