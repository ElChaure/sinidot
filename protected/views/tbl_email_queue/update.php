<?php
$this->breadcrumbs=array(
	'Tbl Email Queues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tbl_email_queue','url'=>array('index')),
	array('label'=>'Crear Tbl_email_queue','url'=>array('create')),
	array('label'=>'Ver Tbl_email_queue','url'=>array('view','id'=>$model->id)),
	array('label'=>'Gestionar Tbl_email_queue','url'=>array('admin')),
);
?>

<h1>Actualizar Tbl_email_queue <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>