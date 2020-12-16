<?php
$this->breadcrumbs=array(
	'Estatus del Personal'=>array('index'),
	$model->estatus_id,
);

$this->menu=array(
	array('label'=>'Listar Estatus del Personal','url'=>array('index')),
	array('label'=>'Crear Estatus de Personal','url'=>array('create')),
	array('label'=>'Actualizar Estatus de Personal','url'=>array('update','id'=>$model->estatus_id)),
	//array('label'=>'Eliminar Estatus de Personal','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->estatus_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Estatus del Personal','url'=>array('admin')),
);
?>

<h1>Ver Estatus de Personal #<?php echo $model->estatus; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'estatus_id',
		'estatus',
	),
)); ?>
