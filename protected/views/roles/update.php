<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->rol_id=>array('view','id'=>$model->rol_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Roles','url'=>array('index')),
	array('label'=>'Crear Roles','url'=>array('create')),
	array('label'=>'Ver Roles','url'=>array('view','id'=>$model->rol_id)),
	array('label'=>'Gestionar Roles','url'=>array('admin')),
);
?>

<h1>Actualizar Roles <?php echo $model->rol_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>