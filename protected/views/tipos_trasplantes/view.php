<?php
$this->breadcrumbs=array(
	'Tipos de Trasplantes'=>array('index'),
	$model->tipo_trasplante_id,
);

$this->menu=array(
	array('label'=>'Listar Tipos de Trasplantes','url'=>array('index')),
	array('label'=>'Crear Tipo de Trasplante','url'=>array('create')),
	array('label'=>'Actualizar Tipo de Trasplante','url'=>array('update','id'=>$model->tipo_trasplante_id)),
	//array('label'=>'Eliminar Tipo de Trasplante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_trasplante_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Tipos de Trasplantes','url'=>array('admin')),
);
?>

<h1>Ver Tipo de Trasplante <?php echo $model->tipo_trasplante; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_trasplante_id',
		'tipo_trasplante',
	),
)); ?>
