<?php
$this->breadcrumbs=array(
	'Organoses'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Organos','url'=>array('index')),
	array('label'=>'Crear Organos','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('organos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Organoses</h1>

<p>
Opcionalmente puede usar un operador de comparaciòn (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de bùsqueda para especificar còmo se debe hacer la comparaciòn. .
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'organos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'organo_id',
		'donante_id',
		'codigo',
		'fecha_ablacion',
		'hora_ablacion',
		'rinon_id',
		/*
		'paciente_id',
		'hora_asignacion',
		'estatus_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
