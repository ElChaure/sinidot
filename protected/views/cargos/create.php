<?php
$this->breadcrumbs=array(
	'Cargos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Cargos','url'=>array('index')),
	array('label'=>'Gestionar Cargos','url'=>array('admin')),
);
?>

<h1>Crear Cargo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
