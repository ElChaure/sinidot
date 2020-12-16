<?php
$this->breadcrumbs=array(
	'Tipos de Dialisis'=>array('index'),
	$model->dialisis_id=>array('view','id'=>$model->dialisis_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Dialisis','url'=>array('index')),
	array('label'=>'Crear Tipo de Dialisis','url'=>array('create')),
	array('label'=>'Ver Tipo de Dialisis','url'=>array('view','id'=>$model->dialisis_id)),
	array('label'=>'Gestionar Tipos de Dialisis','url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Dialisis <?php echo $model->tipo_dialisis; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>