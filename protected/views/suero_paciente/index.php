<?php
$this->breadcrumbs=array(
	'Entrega de Suero Pacientes',
);

$this->menu=array(
	array('label'=>'Crear Suero_paciente','url'=>array('create')),
	array('label'=>'Gestionar Suero_paciente','url'=>array('admin')),
);
?>

<h1>Suero Pacientes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
