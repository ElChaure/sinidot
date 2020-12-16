<?php
$this->breadcrumbs=array(
	'Tipos de Donantes'=>array('index'),
	$model->tipo_donante_id=>array('view','id'=>$model->tipo_donante_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Donantes','url'=>array('index')),
	array('label'=>'Crear Tipo de Donante','url'=>array('create')),
	array('label'=>'Ver Tipo de Donante','url'=>array('view','id'=>$model->tipo_donante_id)),
	array('label'=>'Gestionar Tipos de Donantes','url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Donante <?php echo $model->tipo_donante; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>