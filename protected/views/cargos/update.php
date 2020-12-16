<?php
$this->breadcrumbs=array(
	'Cargos'=>array('index'),
	$model->cargo_id=>array('view','id'=>$model->cargo_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Cargos','url'=>array('index')),
	array('label'=>'Crear Cargo','url'=>array('create')),
	array('label'=>'Ver Cargo','url'=>array('view','id'=>$model->cargo_id)),
	array('label'=>'Gestionar Cargos','url'=>array('admin')),
);
?>

<h1>Actualizar Cargo <?php echo $model->cargo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
