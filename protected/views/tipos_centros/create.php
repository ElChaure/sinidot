<?php
$this->breadcrumbs=array(
	'Tipos de Centros de Hospitalarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Centros Hospitalarios','url'=>array('index')),
	array('label'=>'Gestionar Tipos de Centros Hospitalarios','url'=>array('admin')),
);
?>

<h1>Crear Tipos de Centro Hospitalario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
