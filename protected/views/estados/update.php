<?php
$this->breadcrumbs=array(
	'Estadoses'=>array('index'),
	$model->estado_id=>array('view','id'=>$model->estado_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estados','url'=>array('index')),
	array('label'=>'Crear Estado','url'=>array('create')),
	array('label'=>'Ver Estado','url'=>array('view','id'=>$model->estado_id)),
	array('label'=>'Gestionar Estados','url'=>array('admin')),
);
?>

<h1>Actualizar Estado <?php echo $model->estado; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>