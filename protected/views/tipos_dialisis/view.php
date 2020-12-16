<?php
$this->breadcrumbs=array(
	'Tipos de Dialisis'=>array('index'),
	$model->dialisis_id,
);

$this->menu=array(
	array('label'=>'Listar Tipos de Dialisis','url'=>array('index')),
	array('label'=>'Crear Tipo de Dialisis','url'=>array('create')),
	array('label'=>'Actualizar Tipo de Dialisis','url'=>array('update','id'=>$model->dialisis_id)),
	//array('label'=>'Eliminar Tipo de Dialisis','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->dialisis_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Tipos de Dialisis','url'=>array('admin')),
);
?>

<h1>Ver Tipo de Dialisis <?php echo $model->tipo_dialisis; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'dialisis_id',
		'tipo_dialisis',
	),
)); ?>
