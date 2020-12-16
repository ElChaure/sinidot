<?php
$this->breadcrumbs=array(
	'Parroquias'=>array('index'),
	$model->parroquia_id,
);

$this->menu=array(
	array('label'=>'Listar Parroquias','url'=>array('index')),
	array('label'=>'Crear Parroquia','url'=>array('create')),
	array('label'=>'Actualizar Parroquia','url'=>array('update','id'=>$model->parroquia_id)),
	//array('label'=>'Eliminar Parroquia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->parroquia_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Parroquias','url'=>array('admin')),
);
?>

<h1>Ver Parroquia <?php echo $model->parroquia; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'parroquia_id',
		'municipio.municipio',
		'parroquia',
	),
)); ?>
