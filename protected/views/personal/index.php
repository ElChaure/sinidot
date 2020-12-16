<?php
$this->breadcrumbs=array(
	'Personal',
);

$this->menu=array(
	array('label'=>'Crear Personal','url'=>array('create')),
	array('label'=>'Gestionar Personal','url'=>array('admin')),
);
?>

<h1>Personal</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
