<?php
$this->breadcrumbs=array(
	'Parroquias'=>array('index'),
	$model->parroquia_id=>array('view','id'=>$model->parroquia_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Parroquias','url'=>array('index')),
	array('label'=>'Crear Parroquia','url'=>array('create')),
	array('label'=>'Ver Parroquia','url'=>array('view','id'=>$model->parroquia_id)),
	array('label'=>'Gestionar Parroquias','url'=>array('admin')),
);
?>

<h1>Actualizar Parroquia <?php echo $model->parroquia; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>