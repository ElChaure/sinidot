<?php
$this->breadcrumbs=array(
	'Centros Hospitalarios',
);

$this->menu=array(
	array('label'=>'Crear Centro Hospitalario','url'=>array('create')),
	array('label'=>'Gestionar Centros Hospitalarios','url'=>array('admin')),
);
?>

<h1>Centros Hospitalarios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
