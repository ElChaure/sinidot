<?php
$this->breadcrumbs=array(
	'Tipos de Trasplantes'=>array('index'),
	$model->tipo_trasplante_id=>array('view','id'=>$model->tipo_trasplante_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Trasplantes','url'=>array('index')),
	array('label'=>'Crear Tipo de Trasplante','url'=>array('create')),
	array('label'=>'Ver Tipo de Trasplante','url'=>array('view','id'=>$model->tipo_trasplante_id)),
	array('label'=>'Gestionar Tipos de Trasplantes','url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Trasplante <?php echo $model->tipo_trasplante; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>