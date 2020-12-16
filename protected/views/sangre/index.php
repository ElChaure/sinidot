<?php
$this->breadcrumbs=array(
	'Grupos Sanguineos',
);

$this->menu=array(
	array('label'=>'Crear Grupo Sanguineo','url'=>array('create')),
	array('label'=>'Gestionar Grupos Sanguineos','url'=>array('admin')),
);
?>

<h1>Grupos Sanguineos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
