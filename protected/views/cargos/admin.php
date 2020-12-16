<?php
$this->breadcrumbs=array(
	'Cargos'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Cargos','url'=>array('index')),
	array('label'=>'Crear Cargos','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cargos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Cargos</h1>

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
	'id'=>'cargos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cargo_id',
        'codigo_cargo',		
		'cargo',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update} {delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Cargo',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("cargos/view", array("id"=>$data->cargo_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Cargo',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("cargos/update", array("id"=>$data->cargo_id))',
                    'options'=>array(
                        'class'=>'btn btn-small btn-success',
                    ),
                ),

                'delete' => array
                (
                    'label'=>'Eliminar Cargo',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("cargos/delete", array("id"=>$data->cargo_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),


           
            ),
            'htmlOptions'=>array(
                'style'=>'width: 220px',
            ),
        )
	),
)); ?>
