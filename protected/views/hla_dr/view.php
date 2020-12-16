<?php
$this->breadcrumbs=array(
	'Hla Drs'=>array('index'),
	$model->locus_dr_id,
);

$this->menu=array(
	array('label'=>'Listar Hla_dr','url'=>array('index')),
	array('label'=>'Crear Hla_dr','url'=>array('create')),
	array('label'=>'Actualizar Hla_dr','url'=>array('update','id'=>$model->locus_dr_id)),
	//array('label'=>'Eliminar Hla_dr','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->locus_dr_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Hla_dr','url'=>array('admin')),
);
?>

<h1>Ver Hla_dr #<?php echo $model->locus_dr_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'locus_dr_id',
		'locus_dr_alelo_1',
	),
)); ?>
