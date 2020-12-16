<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Estados','url'=>array('index')),
	array('label'=>'Crear Estado','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('estados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Estados</h1>

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
	'id'=>'estados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'estado_id',
		'estado',
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
