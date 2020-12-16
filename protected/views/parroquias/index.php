<?php
$this->breadcrumbs=array(
	'Parroquias',
);

$this->menu=array(
	array('label'=>'Crear Parroquia','url'=>array('create')),
	array('label'=>'Gestionar Parroquias','url'=>array('admin')),
);
?>

<h1>Parroquias</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
