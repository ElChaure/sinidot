<?php
$this->breadcrumbs=array(
	'Examenes'=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>'List Examenes','url'=>array('index')),
	//array('label'=>'Manage Examenes','url'=>array('admin')),
	//array('label'=>'Regeresar','url'=>array('admin')),
    array('label'=>'Regresar','url'=>array('pacientes/view','id'=>$paciente_id)),
);
?>

<h1>Crear Examen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'paciente_id'=>$paciente_id,)); ?>
