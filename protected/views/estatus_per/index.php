<?php
$this->breadcrumbs=array(
	'Estatus del Personal',
);

$this->menu=array(
	array('label'=>'Crear Estatus de Personal','url'=>array('create')),
	array('label'=>'Gestionar Estatus del Personal','url'=>array('admin')),
);
?>

<h1>Estatus del Personal</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
