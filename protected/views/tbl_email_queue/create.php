<?php
$this->breadcrumbs=array(
	'Tbl Email Queues'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tbl_email_queue','url'=>array('index')),
	array('label'=>'Gestionar Tbl_email_queue','url'=>array('admin')),
);
?>

<h1>Crear Tbl_email_queue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>