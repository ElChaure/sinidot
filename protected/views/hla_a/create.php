<?php
$this->breadcrumbs=array(
	'Hla As'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Hla_a','url'=>array('index')),
	array('label'=>'Gestionar Hla_a','url'=>array('admin')),
);
?>

<h1>Crear Hla_a</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>