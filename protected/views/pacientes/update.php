<?php
$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->paciente_id=>array('view','id'=>$model->paciente_id),
	'Actualizar',
);

$this->menu=array(
	//array('label'=>'Listar Pacientes','url'=>array('index')),
	array('label'=>'Crear Pacientes','url'=>array('create')),
	array('label'=>'Ver Pacientes','url'=>array('view','id'=>$model->paciente_id)),
	array('label'=>'Gestionar Pacientes','url'=>array('admin')),
);
?>

<h1>Actualizar Pacientes <?php echo $model->paciente_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>