<?php
$this->breadcrumbs=array(
	'Tipos de Trasplantes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Trasplantes','url'=>array('index')),
	array('label'=>'Gestionar Tipos de Trasplantes','url'=>array('admin')),
);
?>

<h1>Crear Tipo de Trasplante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>