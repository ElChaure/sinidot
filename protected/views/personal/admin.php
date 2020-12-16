<?php
$this->breadcrumbs=array(
	'Personal'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Personal','url'=>array('index')),
	array('label'=>'Crear Personal','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('personal-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Personal</h1>

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
	'id'=>'personal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'personal_id',
		'cedula',
		'apellido1',
		'apellido2',
		'nombre1',
		'nombre2',
		/*
		'centro_id',
		'cargo_id',
		'fecha_ingreso',
		'estatus_id',
		'nacionalidad',
		*/
			array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Datos del Personal',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("personal/view", array("id"=>$data->personal_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Datos del Personal',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("personal/update", array("id"=>$data->personal_id))',
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
