<?php
$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	$model->donante_id=>array('view','id'=>$model->donante_id),
	'Actualizar',
);

$this->menu=array(
	//array('label'=>'Listar Donantes','url'=>array('index')),
	array('label'=>'Crear Donantes','url'=>array('create')),
	array('label'=>'Ver Donantes','url'=>array('view','id'=>$model->donante_id)),
	array('label'=>'Gestionar Donantes','url'=>array('admin')),
);
?>

<h1>Actualizar Donantes <?php echo $model->donante_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>