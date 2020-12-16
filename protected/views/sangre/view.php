<?php
$this->breadcrumbs=array(
	'Grupos Sanguineos'=>array('index'),
	$model->sangre_id,
);

$this->menu=array(
	array('label'=>'Listar Grupos Sanguineos','url'=>array('index')),
	array('label'=>'Crear Grupo Sanguineo','url'=>array('create')),
	array('label'=>'Actualizar Grupo Sanguineo','url'=>array('update','id'=>$model->sangre_id)),
	//array('label'=>'Eliminar Grupo Sanguineo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->sangre_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Grupos Sanguineos','url'=>array('admin')),
);
?>

<h1>Ver Grupo Sanguineo <?php echo $model->grupo_sanguineo; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'sangre_id',
		'grupo_sanguineo',
	),
)); ?>
