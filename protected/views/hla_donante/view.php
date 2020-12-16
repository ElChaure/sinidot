<?php
$this->breadcrumbs=array(
	'Hla Donantes'=>array('index'),
	$model->donante_id,
);

$this->menu=array(
	//array('label'=>'Listar Hla_donante','url'=>array('index')),
	//array('label'=>'Crear Hla_donante','url'=>array('create')),
	//array('label'=>'Actualizar Hla_donante','url'=>array('update','id'=>$model->donante_id)),
	////array('label'=>'Eliminar Hla_donante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->donante_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	//array('label'=>'Gestionar Hla_donante','url'=>array('admin')),
       array('label'=>'Regresar','url'=>array('donantes/view','id'=>$model->donante_id)),
);
?>

<h1>Ver Hla_donante #<?php echo $model->donante_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'donante_id',
		'fecha_prueba',
		'identificacion_prueba',
		'locus_a_alelo_1',
		'locus_b_alelo_1',
		'locus_dr_alelo_1',
	),
)); ?>
