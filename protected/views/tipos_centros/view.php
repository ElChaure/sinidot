<?php
$this->breadcrumbs=array(
	'Tipos Centros de Hospitalarios'=>array('index'),
	$model->tipo_centro_id,
);

$this->menu=array(
	array('label'=>'Listar Tipos de Centros Hospitalarios','url'=>array('index')),
	array('label'=>'Crear Tipo de Centro Hospitalario','url'=>array('create')),
	array('label'=>'Actualizar Tipo de Centro Hospitalario','url'=>array('update','id'=>$model->tipo_centro_id)),
	//array('label'=>'Eliminar Tipos_centros','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_centro_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Tipos de Centros Hospitalarios','url'=>array('admin')),
);
?>

<h1>Ver Tipo de Centro Hospitalario <?php echo $model->tipo_centro; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_centro_id',
		'tipo_centro',
	),
)); ?>
