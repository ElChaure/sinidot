<?php
$this->breadcrumbs=array(
	'Hla Bs'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Hla_b','url'=>array('index')),
	array('label'=>'Gestionar Hla_b','url'=>array('admin')),
);
?>

<h1>Crear Hla_b</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>