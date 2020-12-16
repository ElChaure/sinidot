<?php
$this->breadcrumbs=array(
	'Organos Procurados'=>array('index'),
	$model->organo_id,
);

$this->menu=array(
	//array('label'=>'Listar Organos','url'=>array('index')),
	//array('label'=>'Crear Organos','url'=>array('create')),
	//array('label'=>'Actualizar Organos','url'=>array('update','id'=>$model->organo_id)),
	////array('label'=>'Eliminar Organos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->organo_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	//array('label'=>'Gestionar Organos','url'=>array('admin')),
      array('label'=>'Regresar','url'=>array('donantes/view','id'=>$model->donante_id)),
);
?>

<h1>Ver Organos #<?php echo $model->organo_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'organo_id',
		'donante_id',
		'codigo',
		'fecha_ablacion',
		'hora_ablacion',
		'rinon_id',
		'paciente_id',
		'hora_asignacion',
		'estatus_id',
	),
)); ?>
