<?php
$this->breadcrumbs=array(
	'Pacientes',
);

$this->menu=array(
	array('label'=>'Crear Pacientes','url'=>array('create')),
	array('label'=>'Gestionar Pacientes','url'=>array('admin')),
);
?>

<h1>Pacientes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
