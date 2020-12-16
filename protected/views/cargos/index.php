<?php
$this->breadcrumbs=array(
	'Cargos',
);

$this->menu=array(
	array('label'=>'Crear Cargo','url'=>array('create')),
	array('label'=>'Gestionar Cargos','url'=>array('admin')),
);
?>

<h1>Cargoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
