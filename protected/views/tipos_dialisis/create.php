<?php
$this->breadcrumbs=array(
	'Tipos de Dialisis'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Dialisis','url'=>array('index')),
	array('label'=>'Gestionar Tipos de Dialisis','url'=>array('admin')),
);
?>

<h1>Crear Tipo de Dialisis</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>