<?php
$this->breadcrumbs=array(
	'Hla Donantes'=>array('index'),
	$model->donante_id=>array('view','id'=>$model->donante_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Hla_donante','url'=>array('index')),
	array('label'=>'Crear Hla_donante','url'=>array('create')),
	array('label'=>'Ver Hla_donante','url'=>array('view','id'=>$model->donante_id)),
	array('label'=>'Gestionar Hla_donante','url'=>array('admin')),
);
?>

<h1>Actualizar Hla_donante <?php echo $model->donante_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>