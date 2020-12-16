<?php
$this->breadcrumbs=array(
	'Municipios'=>array('index'),
	$model->municipio_id,
);

$this->menu=array(
	array('label'=>'Listar Municipios','url'=>array('index')),
	array('label'=>'Crear Municipio','url'=>array('create')),
	array('label'=>'Actualizar Municipio','url'=>array('update','id'=>$model->municipio_id)),
	//array('label'=>'Eliminar Municipio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->municipio_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Municipios','url'=>array('admin')),
);
?>

<h1>Ver Municipio <?php echo $model->municipio; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'municipio_id',
		'estado.estado',		
		'municipio',
	),
)); ?>
