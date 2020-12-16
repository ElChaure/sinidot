<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Usuarios','url'=>array('index')),
	array('label'=>'Gestionar Usuarios','url'=>array('admin')),
);
?>

<h1>Crear Usuarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>