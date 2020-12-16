<?php
$this->breadcrumbs=array(
	'Centros Hospitalarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Centros Hospitalarios','url'=>array('index')),
	array('label'=>'Gestionar Centros Hospitalarios','url'=>array('admin')),
);
?>

<h1>Crear Centro Hospitalario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
