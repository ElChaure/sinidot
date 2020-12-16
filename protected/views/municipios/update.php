<?php
$this->breadcrumbs=array(
	'Municipios'=>array('index'),
	$model->municipio_id=>array('view','id'=>$model->municipio_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Municipios','url'=>array('index')),
	array('label'=>'Crear Municipio','url'=>array('create')),
	array('label'=>'Ver Municipio','url'=>array('view','id'=>$model->municipio_id)),
	array('label'=>'Gestionar Municipios','url'=>array('admin')),
);
?>

<h1>Actualizar Municipio <?php echo $model->municipio; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>