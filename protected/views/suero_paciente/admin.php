<?php
$this->breadcrumbs=array(
	'Entrega de Suero Pacientes'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Suero_paciente','url'=>array('index')),
	array('label'=>'Crear Suero_paciente','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('suero-paciente-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Suero Pacientes</h1>

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
	'id'=>'suero-paciente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'suero_pac_id',
		'paciente_id',
		'fecha_entrega',
		'identificacion_muestra',
		'identificacion_prueba',
			array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Datos del Entrega de Suero',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("suero_paciente/view", array("id"=>$data->suero_pac_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Datos de Entrega de Suero',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("suero_paciente/update", array("id"=>$data->suero_pac_id))',
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
