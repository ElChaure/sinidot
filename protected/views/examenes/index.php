<?php
$this->breadcrumbs=array(
	'Examenes',
);

$this->menu=array(
	array('label'=>'Create Examenes','url'=>array('create')),
	array('label'=>'Manage Examenes','url'=>array('admin')),
);
?>

<h1>Examenes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
