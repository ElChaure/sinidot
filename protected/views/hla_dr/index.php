<?php
$this->breadcrumbs=array(
	'Hla Drs',
);

$this->menu=array(
	array('label'=>'Crear Hla_dr','url'=>array('create')),
	array('label'=>'Gestionar Hla_dr','url'=>array('admin')),
);
?>

<h1>Hla Drs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
