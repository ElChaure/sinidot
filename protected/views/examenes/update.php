<?php
$this->breadcrumbs=array(
	'Examenes'=>array('index'),
	$model->examen_id=>array('view','id'=>$model->examen_id),
	'Actualiza',
);

$this->menu=array(
	//array('label'=>'List Examenes','url'=>array('index')),
	//array('label'=>'Create Examenes','url'=>array('create')),
	//array('label'=>'View Examenes','url'=>array('view','id'=>$model->examen_id)),
	//array('label'=>'Manage Examenes','url'=>array('admin')),
	array('label'=>'Regresar','url'=>array('pacientes/view','id'=>$model->paciente_id)),
);
?>

<h1>Actualiza Examen <?php echo $model->examen_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>