<?php
$this->breadcrumbs=array(
	'Hla Pacientes'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Hla_paciente','url'=>array('index')),
	array('label'=>'Crear Hla_paciente','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hla-paciente-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Hla Pacientes</h1>

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
	'id'=>'hla-paciente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'paciente_id',
		'fecha_prueba',
		'identificacion_prueba',
		'locus_a_alelo_1',
		'locus_b_alelo_1',
		'locus_dr_alelo_1',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver HLA Paciente',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("hla_paciente/view", array("id"=>$data->paciente_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza HLA Paciente',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("hla_paciente/update", array("id"=>$data->paciente_id))',
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
