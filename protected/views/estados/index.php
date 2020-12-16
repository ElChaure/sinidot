<?php
$this->breadcrumbs=array(
	'Estados',
);

$this->menu=array(
	array('label'=>'Crear Estado','url'=>array('create')),
	array('label'=>'Gestionar Estados','url'=>array('admin')),
);
?>

<h1>Estados</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
