<?php
$this->breadcrumbs=array(
	'Tipos de Donantes'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Donantes','url'=>array('index')),
	array('label'=>'Crear Tipo de Donante','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tipos-donantes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Tipos de Donantes</h1>

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
	'id'=>'tipos-donantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tipo_donante_id',
		'tipo_donante',
			array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Datos del Tipo de Donante',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("tipos_donantes/view", array("id"=>$data->tipo_donante_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Datos de Tipo de Donante',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("tipos_donantes/update", array("id"=>$data->tipo_donante_id))',
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
