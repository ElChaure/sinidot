<?php
$this->breadcrumbs=array(
	'Suero Donantes'=>array('index'),
	'Crear',
);


$this->menu=array(
	//array('label'=>'Listar Suero_donante','url'=>array('index')),
	//array('label'=>'Gestionar Suero_donante','url'=>array('admin')),
	//array('label'=>'Regresar','url'=>array('donantes/view','id'=>$id)),
	array('label'=>'Regresar','url'=>array('donantes/view','id'=>$model->donante_id)),
);
?>

<h1>Crear Entrega de Suero de Donante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>