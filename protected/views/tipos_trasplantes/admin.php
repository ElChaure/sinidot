<?php
$this->breadcrumbs=array(
	'Tipos de Trasplantes'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Trasplantes','url'=>array('index')),
	array('label'=>'Crear Tipos de Trasplantes','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tipos-trasplantes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Tipos de Trasplantes</h1>

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
	'id'=>'tipos-trasplantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tipo_trasplante_id',
		'tipo_trasplante',
		    array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Datos del Tipos de Trasplante',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("tipos_trasplantes/view", array("id"=>$data->tipo_trasplante_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Datos de Tipos de Trasplantes',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("tipos_trasplantes/update", array("id"=>$data->tipo_trasplante_id))',
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
