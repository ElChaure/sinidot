<?php
$this->breadcrumbs=array(
	'Tipos de Donantes'=>array('index'),
	$model->tipo_donante_id,
);

$this->menu=array(
	array('label'=>'Listar Tipos de Donantes','url'=>array('index')),
	array('label'=>'Crear Tipo de Donante','url'=>array('create')),
	array('label'=>'Actualizar Tipo de Donante','url'=>array('update','id'=>$model->tipo_donante_id)),
	//array('label'=>'Eliminar Tipo de Donante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_donante_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Tipos de Donantes','url'=>array('admin')),
);
?>

<h1>Ver Tipo de Donante <?php echo $model->tipo_donante; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_donante_id',
		'tipo_donante',
	),
)); ?>
