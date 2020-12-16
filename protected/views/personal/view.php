<?php
$this->breadcrumbs=array(
	'Personal'=>array('index'),
	$model->personal_id,
);

$this->menu=array(
	array('label'=>'Listar Personal','url'=>array('index')),
	array('label'=>'Crear Personal','url'=>array('create')),
	array('label'=>'Actualizar Personal','url'=>array('update','id'=>$model->personal_id)),
	//array('label'=>'Eliminar Personal','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->personal_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Personal','url'=>array('admin')),
);
?>

<h1>Ver Personal #<?php echo $model->personal_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'personal_id',
		'nacionalidad',		
		'cedula',
		'apellido1',
		'apellido2',
		'nombre1',
		'nombre2',
		'centro.nombre',
		'cargo.cargo',
		'fecha_ingreso',
		'estatus.estatus',

	),
)); ?>
