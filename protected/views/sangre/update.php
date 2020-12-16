<?php
$this->breadcrumbs=array(
	'Grupos Sanguineos'=>array('index'),
	$model->sangre_id=>array('view','id'=>$model->sangre_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Grupos Sanguineos','url'=>array('index')),
	array('label'=>'Crear Grupo Sanguineo','url'=>array('create')),
	array('label'=>'Ver Grupo Sanguineo','url'=>array('view','id'=>$model->sangre_id)),
	array('label'=>'Gestionar Grupos Sanguineos','url'=>array('admin')),
);
?>

<h1>Actualizar Grupo Sanguineo <?php echo $model->sangre_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>