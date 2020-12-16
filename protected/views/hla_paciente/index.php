<?php
$this->breadcrumbs=array(
	'Hla Pacientes',
);

$this->menu=array(
	array('label'=>'Crear Hla_paciente','url'=>array('create')),
	array('label'=>'Gestionar Hla_paciente','url'=>array('admin')),
);
?>

<h1>Hla Pacientes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
