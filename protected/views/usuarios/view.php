<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->usuario_id,
);

$this->menu=array(
	array('label'=>'Listar Usuarios','url'=>array('index')),
	array('label'=>'Crear Usuarios','url'=>array('create')),
	array('label'=>'Actualizar Usuarios','url'=>array('update','id'=>$model->usuario_id)),
	//array('label'=>'Eliminar Usuarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Usuarios','url'=>array('admin')),
);
?>

<h1>Ver Usuarios #<?php echo $model->usuario_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'usuario_id',
		'usuario',
		'clave',
		'nombre',
		'centro_id',
		'rol_id',
		'estatus_id',
		'tipo_trasplante_id',
	),
)); ?>
