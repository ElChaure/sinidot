<?php
$this->breadcrumbs=array(
	'Estatus de Pacientes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estatus de Pacientes','url'=>array('index')),
	array('label'=>'Gestionar Estatus de Pacientes','url'=>array('admin')),
);
?>

<h1>Crear Estatus de Paciente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
