<?php
$this->breadcrumbs=array(
	'Hla As',
);

$this->menu=array(
	array('label'=>'Crear Hla_a','url'=>array('create')),
	array('label'=>'Gestionar Hla_a','url'=>array('admin')),
);
?>

<h1>Hla As</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
