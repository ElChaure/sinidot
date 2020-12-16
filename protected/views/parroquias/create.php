<?php
$this->breadcrumbs=array(
	'Parroquias'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Parroquias','url'=>array('index')),
	array('label'=>'Gestionar Parroquias','url'=>array('admin')),
);
?>

<h1>Crear Parroquia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>