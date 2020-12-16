<?php
$this->breadcrumbs=array(
	'Condicion de Pacientes'=>array('index'),
	$model->condicion_id=>array('view','id'=>$model->condicion_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Condiciones de Pacientes','url'=>array('index')),
	array('label'=>'Crear Condicion de Paciente','url'=>array('create')),
	array('label'=>'Ver Condicion de Paciente','url'=>array('view','id'=>$model->condicion_id)),
	array('label'=>'Gestionar Condiciones de Paciente','url'=>array('admin')),
);
?>

<h1>Actualizar Condicion de Paciente <?php echo $model->condicion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
