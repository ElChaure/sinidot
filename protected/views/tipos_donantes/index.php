<?php
$this->breadcrumbs=array(
	'Tipos de Donantes',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Donante','url'=>array('create')),
	array('label'=>'Gestionar Tipos de Donantes','url'=>array('admin')),
);
?>

<h1>Tipos de Donantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
