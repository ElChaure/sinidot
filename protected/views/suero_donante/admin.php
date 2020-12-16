<?php
$this->breadcrumbs=array(
	'Suero Donantes'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Suero_donante','url'=>array('index')),
	array('label'=>'Crear Suero_donante','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('suero-donante-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Suero Donantes</h1>

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
	'id'=>'suero-donante-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'suero_don_id',
		'donante_id',
		'fecha_entrega',
		'identificacion_muestra',
		'identificacion_prueba',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Entrega de Sueros',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("suero_donante/view", array("id"=>$data->suero_don_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Entrega de Sueros',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("suero_donante/update", array("id"=>$data->suero_don_id))',
                    'options'=>array(
                        'class'=>'btn btn-small btn-success',
                    ),
                ),
           
            ),
            'htmlOptions'=>array(
                'style'=>'width: 220px',
            ),
        ) 
	),
)); ?>
