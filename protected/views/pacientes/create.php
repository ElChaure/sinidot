<?php
$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>'Listar Pacientes','url'=>array('index')),
	array('label'=>'Gestionar Pacientes','url'=>array('admin')),
);
?>

<h1>Crear Pacientes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>