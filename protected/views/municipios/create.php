<?php
$this->breadcrumbs=array(
	'Municipios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Municipios','url'=>array('index')),
	array('label'=>'Gestionar Municipios','url'=>array('admin')),
);
?>

<h1>Crear Municipio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>