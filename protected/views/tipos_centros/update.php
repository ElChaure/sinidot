<?php
$this->breadcrumbs=array(
	'Tipos de Centros Hospitalarios'=>array('index'),
	$model->tipo_centro_id=>array('view','id'=>$model->tipo_centro_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Centros Hospitalarios','url'=>array('index')),
	array('label'=>'Crear Tipo de Centro Hospitalario','url'=>array('create')),
	array('label'=>'Ver Tipo de Centro Hospitalario','url'=>array('view','id'=>$model->tipo_centro_id)),
	array('label'=>'Gestionar Tipos de Centros Hospitalarios','url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Centro Hospitalario <?php echo $model->tipo_centro; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
