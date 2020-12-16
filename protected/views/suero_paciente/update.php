<?php
$this->breadcrumbs=array(
	'Entrega de Suero Pacientes'=>array('index'),
	$model->suero_pac_id=>array('view','id'=>$model->suero_pac_id),
	'Actualizar',
);

$this->menu=array(
	/*array('label'=>'Listar Suero_paciente','url'=>array('index')),
	array('label'=>'Crear Suero_paciente','url'=>array('create')),
	array('label'=>'Ver Suero_paciente','url'=>array('view','id'=>$model->suero_pac_id)),
	array('label'=>'Gestionar Suero_paciente','url'=>array('admin')),*/
	array('label'=>'Regresar', 'url'=>array('pacientes/view', 'id'=>$model->paciente_id)),
);
?>

<h1>Actualizar Entrega de Suero de Paciente <?php echo $model->suero_pac_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>