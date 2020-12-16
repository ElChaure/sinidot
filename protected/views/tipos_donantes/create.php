<?php
$this->breadcrumbs=array(
	'Tipos de Donantes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Donantes','url'=>array('index')),
	array('label'=>'Gestionar Tipos de Donantes','url'=>array('admin')),
);
?>

<h1>Crear Tipo de Donante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>