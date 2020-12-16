<?php
$this->breadcrumbs=array(
	'Organoses'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Organos','url'=>array('index')),
	array('label'=>'Gestionar Organos','url'=>array('admin')),
);
?>

<h1>Crear Organos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>