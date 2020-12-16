<?php
$this->breadcrumbs=array(
	'Organoses'=>array('index'),
	$model->organo_id=>array('view','id'=>$model->organo_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Organos','url'=>array('index')),
	array('label'=>'Crear Organos','url'=>array('create')),
	array('label'=>'Ver Organos','url'=>array('view','id'=>$model->organo_id)),
	array('label'=>'Gestionar Organos','url'=>array('admin')),
);
?>

<h1>Actualizar Organos <?php echo $model->organo_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>