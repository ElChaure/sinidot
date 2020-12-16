<?php
$this->breadcrumbs=array(
	'Estatus de Pacientes'=>array('index'),
	$model->estatus_id=>array('view','id'=>$model->estatus_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estatus de Pacientes','url'=>array('index')),
	array('label'=>'Crear Estatus de Paciente','url'=>array('create')),
	array('label'=>'Ver Estatus de Paciente','url'=>array('view','id'=>$model->estatus_id)),
	array('label'=>'Gestionar Estatus de Pacientes','url'=>array('admin')),
);
?>

<h1>Actualizar Estatus de Paciente <?php echo $model->estatus; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
