<?php
$this->breadcrumbs=array(
	'Entrega de Suero Pacientes'=>array('index'),
	$model->suero_pac_id,
);

$this->menu=array(
	/*array('label'=>'Listar Suero_paciente','url'=>array('index')),
	array('label'=>'Crear Suero_paciente','url'=>array('create')),
	array('label'=>'Actualizar Suero_paciente','url'=>array('update','id'=>$model->suero_pac_id)),
	//array('label'=>'Eliminar Suero_paciente','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->suero_pac_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Suero_paciente','url'=>array('admin')),*/
    array('label'=>'Regresar', 'url'=>array('pacientes/view', 'id'=>$model->paciente_id)),
	);
?>

<h1>Ver Entrega de Suero del Paciente #<?php echo $model->suero_pac_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'suero_pac_id',
		//'paciente_id',
		'fecha_entrega',
		'identificacion_muestra',
		'identificacion_prueba',
	),
)); ?>
