<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Roles','url'=>array('index')),
	array('label'=>'Gestionar Roles','url'=>array('admin')),
);
?>

<h1>Crear Roles</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>