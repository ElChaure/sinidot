<?php
$this->breadcrumbs=array(
	'Tbl Email Queues',
);

$this->menu=array(
	array('label'=>'Crear Tbl_email_queue','url'=>array('create')),
	array('label'=>'Gestionar Tbl_email_queue','url'=>array('admin')),
);
?>

<h1>Tbl Email Queues</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
