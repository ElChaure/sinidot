<?php
$this->breadcrumbs=array(
	'Tipos de Centros Hospitalarios',
);

$this->menu=array(
	array('label'=>'Tipos de Centro Hospitalario','url'=>array('create')),
	array('label'=>'Gestionar Tipos de Centros Hospitalarios','url'=>array('admin')),
);
?>

<h1>Tipos de Centros Hospitalarios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
