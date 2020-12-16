<?php
$this->breadcrumbs=array(
	'Parroquias'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Parroquias','url'=>array('index')),
	array('label'=>'Crear Parroquia','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('parroquias-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Parroquias</h1>

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
	'id'=>'parroquias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'parroquia_id',
		//'municipio_id',
		array(
            'name'=>'municipio_id',
            'value'=>'$data->municipio->municipio',
            'filter' => CHtml::listData(Municipios::model()->findAll(), 'municipio_id', 'municipio'),
        ),
		'parroquia',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Parroquia',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("parroquias/view", array("id"=>$data->parroquia_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Entrega de Sueros',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("parroquias/update", array("id"=>$data->parroquia_id))',
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
