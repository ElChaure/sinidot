<?php
$this->breadcrumbs=array(
	'Grupos Sanguineos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Grupos Sanguineos','url'=>array('index')),
	array('label'=>'Gestionar Grupos Sanguineos','url'=>array('admin')),
);
?>

<h1>Crear Grupo Sanguineo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>