<?php
$this->breadcrumbs=array(
	'Tipos de Trasplantes',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Trasplante','url'=>array('create')),
	array('label'=>'Gestionar Tipos de Trasplantes','url'=>array('admin')),
);
?>

<h1>Tipos de Trasplantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
