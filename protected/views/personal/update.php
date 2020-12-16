<?php
$this->breadcrumbs=array(
	'Personal'=>array('index'),
	$model->personal_id=>array('view','id'=>$model->personal_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Personal','url'=>array('index')),
	array('label'=>'Crear Personal','url'=>array('create')),
	array('label'=>'Ver Personal','url'=>array('view','id'=>$model->personal_id)),
	array('label'=>'Gestionar Personal','url'=>array('admin')),
);
?>

<h1>Actualizar Personal <?php echo $model->personal_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>