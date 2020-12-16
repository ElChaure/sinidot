<?php
$this->breadcrumbs=array(
	'Hla Pacientes'=>array('index'),
	$model->paciente_id=>array('view','id'=>$model->paciente_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Hla_paciente','url'=>array('index')),
	array('label'=>'Crear Hla_paciente','url'=>array('create')),
	array('label'=>'Ver Hla_paciente','url'=>array('view','id'=>$model->paciente_id)),
	array('label'=>'Gestionar Hla_paciente','url'=>array('admin')),
);
?>

<h1>Actualizar Hla_paciente <?php echo $model->paciente_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>