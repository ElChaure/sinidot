<?php
$this->breadcrumbs=array(
	'Condicion de Pacientes',
);

$this->menu=array(
	array('label'=>'Crear Condicion de Paciente','url'=>array('create')),
	array('label'=>'Gestionar Condiciones de Pacientes','url'=>array('admin')),
);
?>

<h1>Condicion de Pacientes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
