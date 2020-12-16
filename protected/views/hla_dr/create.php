<?php
$this->breadcrumbs=array(
	'Hla Drs'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Hla_dr','url'=>array('index')),
	array('label'=>'Gestionar Hla_dr','url'=>array('admin')),
);
?>

<h1>Crear Hla_dr</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>