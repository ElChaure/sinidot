<?php
$this->breadcrumbs=array(
	'Tipos de Dialisis',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Dialisis','url'=>array('create')),
	array('label'=>'Gestionar Tipos de Dialisis','url'=>array('admin')),
);
?>

<h1>Tipos de Dialisis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
