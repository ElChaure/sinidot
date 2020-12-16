<?php
$this->breadcrumbs=array(
	'Suero Donantes'=>array('index'),
	$model->suero_don_id,
);

$this->menu=array(
	array('label'=>'Listar Suero_donante','url'=>array('index')),
	array('label'=>'Crear Suero_donante','url'=>array('create')),
	array('label'=>'Actualizar Suero_donante','url'=>array('update','id'=>$model->suero_don_id)),
	//array('label'=>'Eliminar Suero_donante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->suero_don_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Suero_donante','url'=>array('admin')),
);
?>

<h1>Ver Suero_donante #<?php echo $model->suero_don_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'suero_don_id',
		'donante_id',
		'fecha_entrega',
		'identificacion_muestra',
		'identificacion_prueba',
	),
)); ?>
