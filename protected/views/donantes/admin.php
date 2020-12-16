<?php
$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Gestion',
);

$this->menu=array(
	//array('label'=>'Listar Donantes','url'=>array('index')),
	array('label'=>'Crear Donantes','url'=>array('create')),
        array('label'=>'Donantes Activos','url'=>array('admin_activos')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('donantes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Donantes</h1>

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

<?php /*$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'donantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'donante_id',
		'cedula',
		'apellido1',
		//'apellido2',
		'nombre1',
		//'nombre2',
		'centro.nombre',
                array(
                   'name'=>'estatus_id',
                   'value'=>'$data->est->estatus',
                   'filter' => CHtml::listData(Estatus_don::model()->findAll(), 'estatus_id', 'estatus'),
                 ),
		/*
		'fecha_nacimiento',
		'causa_muerte',
		'fecha_muerte',
		'tipo_donante_id',
		'centro_id',
		'nacionalidad',
		'peso',
		'talla',
		'genero',
		'diagnostico',
		'antecedentes_personales_patologicos',
		'antecedentes_epidemiologicos',
		'examen_fisico',
		'hemodinamia',
		'diuresis',
		'proceso_infeccioso',
		'tratamiento_antibiotico',
		'sangre_id',
		'perfil_renal',
		'perfil_hepatico',
		'hematies',
		'hemoglobina',
		'hematocrito',
		'vcm',
		'hcm',
		'chcm',
		'leucocitos',
		'plaquetas',
		'cultivos',
		'serologia',
		'drogas_vasoactivas',
		*/
                /*  
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',

		),
	),
)); */?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'donantes-grid',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
		//'donante_id',
		'cedula',
		'apellido1',
		//'apellido2',
		'nombre1',
		//'nombre2',
		'centro.nombre',
                array(
                   'name'=>'estatus_id',
                   'value'=>'$data->est->estatus',
                   'filter' => CHtml::listData(Estatus_don::model()->findAll(), 'estatus_id', 'estatus'),
                 ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update} {print_act}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver Datos del Donante',
                    'icon'=>'icon-eye-open',
                    'url'=>'Yii::app()->createUrl("donantes/view", array("id"=>$data->donante_id))',
                    'options'=>array(
                        'class'=>'btn btn-info',
                    ),
                ),
                
                'update' => array
                (
                    'label'=>'Actualiza Datos del Donante',
                    'icon'=>'pencil white',
                    'url'=>'Yii::app()->createUrl("donantes/update", array("id"=>$data->donante_id))',
                    'options'=>array(
                        'class'=>'btn btn-small btn-success',
                    ),
                ),
                'print_act' => array
                (
                    'label'=>'Busca Pacientes Activos Compatibles',
                    //'icon'=>'print',
                    'visible'=>'$data->estatus_id==1',
                    'icon'=>' icon-share',
                    //'url'=>'Yii::app()->createUrl("donantes/view_cross")',
		      'url'=>'Yii::app()->createUrl("donantes/view_cross", array("id"=>$data->donante_id))',
                    'options'=>array(
                        'class'=>'btn btn-warning',
                    ),
                ),
            ),
            'htmlOptions'=>array(
                'style'=>'width: 220px',
            ),
        ) 
    ),
));
?>
