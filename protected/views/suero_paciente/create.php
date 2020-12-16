<?php
$this->breadcrumbs=array(
	'Entrega de Suero Pacientes'=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>'Listar Suero_paciente','url'=>array('index')),
	//array('label'=>'Gestionar Suero_paciente','url'=>array('admin')),
	 array('label'=>'Regresar','url'=>array('pacientes/view','id'=>$paciente_id)),
);
?>

<h1>Crear Entrega de Suero de Paciente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>