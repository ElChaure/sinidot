<?php
$this->breadcrumbs=array(
	'Tbl Email Queues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Tbl_email_queue','url'=>array('index')),
	array('label'=>'Crear Tbl_email_queue','url'=>array('create')),
	array('label'=>'Actualizar Tbl_email_queue','url'=>array('update','id'=>$model->id)),
	//array('label'=>'Eliminar Tbl_email_queue','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Tbl_email_queue','url'=>array('admin')),
);
?>

<h1>Ver Tbl_email_queue #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'from_name',
		'from_email',
		'to_email',
		'subject',
		'message',
		'max_attempts',
		'attempts',
		'success',
		'date_published',
		'last_attempt',
		'date_sent',
	),
)); ?>
