<?php
$this->breadcrumbs=array(
	'Hla Bs',
);

$this->menu=array(
	array('label'=>'Crear Hla_b','url'=>array('create')),
	array('label'=>'Gestionar Hla_b','url'=>array('admin')),
);
?>

<h1>Hla Bs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
