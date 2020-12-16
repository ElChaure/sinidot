<?php
$this->breadcrumbs=array(
	'Estatus Dons',
);

$this->menu=array(
	array('label'=>'Crear Estatus_don','url'=>array('create')),
	array('label'=>'Gestionar Estatus_don','url'=>array('admin')),
);
?>

<h1>Estatus Dons</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
