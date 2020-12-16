<?php
$this->breadcrumbs=array(
	'Hla Pacientes'=>array('index'),
	$model->paciente_id,
);

$this->menu=array(
	//array('label'=>'Listar Hla_paciente','url'=>array('index')),
	//array('label'=>'Crear Hla_paciente','url'=>array('create')),
	//array('label'=>'Actualizar Hla_paciente','url'=>array('update','id'=>$model->paciente_id)),
	////array('label'=>'Eliminar Hla_paciente','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->paciente_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	//array('label'=>'Gestionar Hla_paciente','url'=>array('admin')),
       array('label'=>'Regresar','url'=>array('pacientes/view','id'=>$model->paciente_id)),
);
?>

<h1>Ver Hla_paciente #<?php echo $model->paciente_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'paciente_id',
		'fecha_prueba',
		'identificacion_prueba',
		'locus_a_alelo_1',
		'locus_b_alelo_1',
		'locus_dr_alelo_1',
	),
)); ?>
