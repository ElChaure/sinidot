<?php
$this->breadcrumbs=array(
	'Hla Drs'=>array('index'),
	$model->locus_dr_id=>array('view','id'=>$model->locus_dr_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Hla_dr','url'=>array('index')),
	array('label'=>'Crear Hla_dr','url'=>array('create')),
	array('label'=>'Ver Hla_dr','url'=>array('view','id'=>$model->locus_dr_id)),
	array('label'=>'Gestionar Hla_dr','url'=>array('admin')),
);
?>

<h1>Actualizar Hla_dr <?php echo $model->locus_dr_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>