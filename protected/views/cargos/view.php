<?php
$this->breadcrumbs=array(
	'Cargos'=>array('index'),
	$model->cargo_id,
);

$this->menu=array(
	array('label'=>'Listar Cargos','url'=>array('index')),
	array('label'=>'Crear Cargo','url'=>array('create')),
	array('label'=>'Actualizar Cargo','url'=>array('update','id'=>$model->cargo_id)),
	//array('label'=>'Eliminar Cargo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->cargo_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Cargos','url'=>array('admin')),
);
?>

<h1>Ver Cargo #<?php echo $model->cargo; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'cargo_id',
		'codigo_cargo',
		'cargo',
	),
)); ?>
