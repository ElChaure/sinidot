<?php
$this->breadcrumbs=array(
	'HLA Donantes'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar HLA Donante','url'=>array('index')),
	array('label'=>'Crear HLA Donante','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hla-donante-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar HLA Donantes</h1>

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
	'id'=>'hla-donante-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'donante_id',
		'fecha_prueba',
		'identificacion_prueba',
		'locus_a_alelo_1',
		'locus_b_alelo_1',
		'locus_dr_alelo_1',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver HLA del Donante',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("hla_donante/view", array("id"=>$data->donante_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza HLA DR',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("hla_donante/update", array("id"=>$data->donante_id))',
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
