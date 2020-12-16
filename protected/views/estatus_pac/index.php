<?php
$this->breadcrumbs=array(
	'Estatus de Pacientes',
);

$this->menu=array(
	array('label'=>'Crear Estatus de Paciente','url'=>array('create')),
	array('label'=>'Gestionar Estatus de Pacientes','url'=>array('admin')),
);
?>

<h1>Estatus de Pacientes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
