<?php
$this->breadcrumbs=array(
	'Estatus del Personal'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estatus del Personal','url'=>array('index')),
	array('label'=>'Gestionar Estatus del Personal','url'=>array('admin')),
);
?>

<h1>Crear Estatus del Personal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
