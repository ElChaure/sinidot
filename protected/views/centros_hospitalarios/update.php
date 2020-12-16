<?php
$this->breadcrumbs=array(
	'Centros Hospitalarios'=>array('index'),
	$model->centro_id=>array('view','id'=>$model->centro_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Centros_hospitalarios','url'=>array('index')),
	array('label'=>'Crear Centros_hospitalarios','url'=>array('create')),
	array('label'=>'Ver Centros_hospitalarios','url'=>array('view','id'=>$model->centro_id)),
	array('label'=>'Gestionar Centros_hospitalarios','url'=>array('admin')),
);
?>

<h1>Actualizar Datos de  <?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
