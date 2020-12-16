<?php
$this->breadcrumbs=array(
	'Condicion de Pacientes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Condicion de Paciente','url'=>array('index')),
	array('label'=>'Gestionar Condiciones de Pacientes','url'=>array('admin')),
);
?>

<h1>Crear Condicion de Paciente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
