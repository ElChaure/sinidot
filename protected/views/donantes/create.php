<?php
$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>'Listar Donantes','url'=>array('index')),
	array('label'=>'Gestionar Donantes','url'=>array('admin')),
);
?>

<h1>Crear Donantes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>