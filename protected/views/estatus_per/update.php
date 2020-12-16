<?php
$this->breadcrumbs=array(
	'Estatus del Personal'=>array('index'),
	$model->estatus_id=>array('view','id'=>$model->estatus_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estatus del Personal','url'=>array('index')),
	array('label'=>'Crear Estatus de Personal','url'=>array('create')),
	array('label'=>'Ver Estatus de Personal','url'=>array('view','id'=>$model->estatus_id)),
	array('label'=>'Gestionar Estatus del Personal','url'=>array('admin')),
);
?>

<h1>Actualizar Estatus de Personal <?php echo $model->estatus_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
