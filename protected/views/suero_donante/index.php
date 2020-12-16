<?php
$this->breadcrumbs=array(
	'Suero Donantes',
);

$this->menu=array(
	array('label'=>'Crear Suero_donante','url'=>array('create')),
	array('label'=>'Gestionar Suero_donante','url'=>array('admin')),
);
?>

<h1>Suero Donantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
