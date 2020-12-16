<?php
$this->breadcrumbs=array(
	'Estatus del Personal'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Estatus del Personal','url'=>array('index')),
	array('label'=>'Crear Estatus de Personal','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('estatus-per-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Estatus del Personal</h1>

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
	'id'=>'estatus-per-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'estatus_id',
		'estatus',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Estatus',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("estatus_per/view", array("id"=>$data->estatus_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Estatus',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("estatus_per/update", array("id"=>$data->estatus_id))',
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
