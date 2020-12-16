<?php
$this->breadcrumbs=array(
	'Suero Donantes'=>array('index'),
	$model->suero_don_id=>array('view','id'=>$model->suero_don_id),
	'Actualizar',
);

$this->menu=array(
	//array('label'=>'Listar Suero_donante','url'=>array('index')),
	//array('label'=>'Crear Suero_donante','url'=>array('create')),
	//array('label'=>'Ver Suero_donante','url'=>array('view','id'=>$model->suero_don_id)),
	//array('label'=>'Gestionar Suero_donante','url'=>array('admin')),
	array('label'=>'Regresar','url'=>array('pacientes/view','id'=>$paciente_id)),
);
?>

<h1>Actualizar Entrega de Suero de Donante <?php echo $model->suero_don_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>