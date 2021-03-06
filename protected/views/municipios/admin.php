<?php
$this->breadcrumbs=array(
	'Municipios'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Municipios','url'=>array('index')),
	array('label'=>'Crear Municipio','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('municipios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Municipios</h1>

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
	'id'=>'municipios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'municipio_id',
		array(
                   'name'=>'estado_id',
                   'value'=>'$data->estado->estado',
                   'filter' => CHtml::listData(Estados::model()->findAll(), 'estado_id', 'estado'),
        ),
		'municipio',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Estado',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("estados/view", array("id"=>$data->estado_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Estado',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("estados/update", array("id"=>$data->estado_id))',
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
