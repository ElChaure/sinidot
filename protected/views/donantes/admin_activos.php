<?php
$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Gestion de Donantes Activos',
);

$this->menu=array(

	array('label'=>'Regresar', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('donantes_activos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Donantes Activos</h1>

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
<?php 
$gridDataProvider=new CActiveDataProvider('Donantes', array(
    'criteria'=>array(
        'condition'=>'estatus_id=1',
        'order'=>'fecha_muerte desc',
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));


    $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'donantes_activos-grid',
	'dataProvider'=>$gridDataProvider,
     'type'=>'bordered condensed',
	'filter'=>$model,
	'columns'=>array(
		//'donante_id',
		'cedula',
		'apellido1',
		'apellido2',
		'nombre1',
		'nombre2',
		'centro.nombre',
                
                
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
