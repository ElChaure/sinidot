<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->usuario_id=>array('view','id'=>$model->usuario_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Usuarios','url'=>array('index')),
	array('label'=>'Crear Usuarios','url'=>array('create')),
	array('label'=>'Ver Usuarios','url'=>array('view','id'=>$model->usuario_id)),
	array('label'=>'Gestionar Usuarios','url'=>array('admin')),
);
?>

<h1>Actualizar Usuarios <?php echo $model->usuario_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>