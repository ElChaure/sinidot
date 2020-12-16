<?php
$this->breadcrumbs=array(
	'Hla As'=>array('index'),
	$model->locus_a_id=>array('view','id'=>$model->locus_a_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Hla_a','url'=>array('index')),
	array('label'=>'Crear Hla_a','url'=>array('create')),
	array('label'=>'Ver Hla_a','url'=>array('view','id'=>$model->locus_a_id)),
	array('label'=>'Gestionar Hla_a','url'=>array('admin')),
);
?>

<h1>Actualizar Hla_a <?php echo $model->locus_a_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>