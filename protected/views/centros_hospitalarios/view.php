<?php
$this->breadcrumbs=array(
	'Centros Hospitalarios'=>array('index'),
	$model->centro_id,
);

$this->menu=array(
	array('label'=>'Listar Centros Hospitalarios','url'=>array('index')),
	array('label'=>'Crear Centro Hospitalario','url'=>array('create')),
	array('label'=>'Actualizar Centro Hospitalarios','url'=>array('update','id'=>$model->centro_id)),
	//array('label'=>'Eliminar Centro Hospitalario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->centro_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Centros Hospitalarios','url'=>array('admin')),
);
?>

<h1>Ver Datos de <?php echo $model->nombre; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'centro_id',
		'cedula',
		'nombre',
        'tipoCentro.tipo_centro',
		'direccion',
		'estado.estado',
		'municipio.municipio',
		'parroquia.parroquia',
		'region.region',
		//'ctx_id',
	),
)); ?>
