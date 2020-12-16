<?php
$this->breadcrumbs=array(
	'Donantes',
);

$this->menu=array(
	array('label'=>'Crear Donantes','url'=>array('create')),
	array('label'=>'Gestionar Donantes','url'=>array('admin')),
);
?>

<h1>Donantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
