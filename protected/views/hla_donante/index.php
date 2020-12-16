<?php
$this->breadcrumbs=array(
	'Hla Donantes',
);

$this->menu=array(
	array('label'=>'Crear Hla_donante','url'=>array('create')),
	array('label'=>'Gestionar Hla_donante','url'=>array('admin')),
);
?>

<h1>Hla Donantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
