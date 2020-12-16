<?php
$this->breadcrumbs=array(
	'Estatus Dons'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estatus_don','url'=>array('index')),
	array('label'=>'Gestionar Estatus_don','url'=>array('admin')),
);
?>

<h1>Crear Estatus_don</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>