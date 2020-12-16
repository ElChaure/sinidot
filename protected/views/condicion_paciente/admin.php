<?php
$this->breadcrumbs=array(
	'Condicion de Pacientes'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Condicion de Paciente','url'=>array('index')),
	array('label'=>'Crear Condicion de Paciente','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('condicion-paciente-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Condiciones de Pacientes</h1>

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
	'id'=>'condicion-paciente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'condicion_id',
		'condicion',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Condicion de Paciente',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("condicion_paciente/view", array("id"=>$data->condicion_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Condicion de Paciente',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("condicion_paciente/update", array("id"=>$data->condicion_id))',
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
