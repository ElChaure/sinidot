<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->estado_id,
);

$this->menu=array(
	array('label'=>'Listar Estados','url'=>array('index')),
	array('label'=>'Crear Estado','url'=>array('create')),
	array('label'=>'Actualizar Estado','url'=>array('update','id'=>$model->estado_id)),
	//array('label'=>'Eliminar Estado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->estado_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Estados','url'=>array('admin')),
);
?>

<h1>Ver Estado <?php echo $model->estado; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'estado_id',
		'estado',
	),
)); ?>
