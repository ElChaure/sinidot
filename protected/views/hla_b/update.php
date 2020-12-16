<?php
$this->breadcrumbs=array(
	'Hla Bs'=>array('index'),
	$model->locus_b_id=>array('view','id'=>$model->locus_b_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Hla_b','url'=>array('index')),
	array('label'=>'Crear Hla_b','url'=>array('create')),
	array('label'=>'Ver Hla_b','url'=>array('view','id'=>$model->locus_b_id)),
	array('label'=>'Gestionar Hla_b','url'=>array('admin')),
);
?>

<h1>Actualizar Hla_b <?php echo $model->locus_b_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>