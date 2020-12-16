<?php
$this->breadcrumbs=array(
	'Estatus Dons'=>array('index'),
	$model->estatus_id=>array('view','id'=>$model->estatus_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estatus_don','url'=>array('index')),
	array('label'=>'Crear Estatus_don','url'=>array('create')),
	array('label'=>'Ver Estatus_don','url'=>array('view','id'=>$model->estatus_id)),
	array('label'=>'Gestionar Estatus_don','url'=>array('admin')),
);
?>

<h1>Actualizar Estatus_don <?php echo $model->estatus_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>