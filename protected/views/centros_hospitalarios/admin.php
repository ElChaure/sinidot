<?php
$this->breadcrumbs=array(
	'Centros Hospitalarios'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Centros Hospitalarios','url'=>array('index')),
	array('label'=>'Crear Centro Hospitalario','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('centros-hospitalarios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Centros Hospitalarios</h1>

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
	'id'=>'centros-hospitalarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'centro_id',
		'cedula',
		'nombre',
                array(
                   'name'=>'tipo_centro_id',
                   'value'=>'$data->tipoCentro->tipo_centro',
                   'filter' => CHtml::listData(Tipos_centros::model()->findAll(), 'tipo_centro_id', 'tipo_centro'),
                 ),
                 array(
                   'name'=>'estado_id',
                   'value'=>'$data->estado->estado',
                   'filter' => CHtml::listData(Estados::model()->findAll(), 'estado_id', 'estado'),
                 ),
		//'direccion',
		//'estado_id',
		//'municipio_id',
		/*
		'parroquia_id',
		'region_id',
		'ctx_id',
		*/
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Centro Hospitalario',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("centros_hospitalarios/view", array("id"=>$data->centro_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Centro Hospitalario',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("centros_hospitalarios/update", array("id"=>$data->centro_id))',
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
