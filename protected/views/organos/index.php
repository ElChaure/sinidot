<?php
$this->breadcrumbs=array(
	'Organoses',
);

$this->menu=array(
	array('label'=>'Crear Organos','url'=>array('create')),
	array('label'=>'Gestionar Organos','url'=>array('admin')),
);
?>

<h1>Organoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
