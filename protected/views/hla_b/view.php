<?php
$this->breadcrumbs=array(
	'Hla Bs'=>array('index'),
	$model->locus_b_id,
);

$this->menu=array(
	array('label'=>'Listar Hla_b','url'=>array('index')),
	array('label'=>'Crear Hla_b','url'=>array('create')),
	array('label'=>'Actualizar Hla_b','url'=>array('update','id'=>$model->locus_b_id)),
	//array('label'=>'Eliminar Hla_b','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->locus_b_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Hla_b','url'=>array('admin')),
);
?>

<h1>Ver Hla_b #<?php echo $model->locus_b_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'locus_b_id',
		'locus_b_alelo_1',
	),
)); ?>
