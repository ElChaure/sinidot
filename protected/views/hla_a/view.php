<?php
$this->breadcrumbs=array(
	'Hla As'=>array('index'),
	$model->locus_a_id,
);

$this->menu=array(
	array('label'=>'Listar Hla_a','url'=>array('index')),
	array('label'=>'Crear Hla_a','url'=>array('create')),
	array('label'=>'Actualizar Hla_a','url'=>array('update','id'=>$model->locus_a_id)),
	//array('label'=>'Eliminar Hla_a','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->locus_a_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Hla_a','url'=>array('admin')),
);
?>

<h1>Ver Hla_a #<?php echo $model->locus_a_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'locus_a_id',
		'locus_a_alelo_1',
	),
)); ?>
