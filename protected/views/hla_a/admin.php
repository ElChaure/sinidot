<?php
$this->breadcrumbs=array(
	'HLA A'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar HLA A','url'=>array('index')),
	array('label'=>'Crear HLA A','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hla-a-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar HLA A</h1>

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
	'id'=>'hla-a-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'locus_a_id',
		'locus_a_alelo_1',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver HLA A',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("hla_b/view", array("id"=>$data->locus_a_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza HLA A',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("hla_a/update", array("id"=>$data->locus_a_id))',
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
