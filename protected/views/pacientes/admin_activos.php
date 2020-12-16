<?php
$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Gestion de Pacientes Aptos',
);

$this->menu=array(
    //array('label'=>'Crossmath', 'url'=>array('admin_cruces')),
	array('label'=>'Regresar', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pacientes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Pacientes Activos</h1>

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
<?php 
$gridDataProvider=new CActiveDataProvider('Pacientes', array(
    'criteria'=>array(
        'condition'=>'(estatus_id=2 OR estatus_id=6) AND puntaje > 0',
		//'condition'=>'puntaje>0',
        'order'=>'puntaje desc',
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));


    $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pacientes-grid',
	'dataProvider'=>$gridDataProvider,
    'rowCssClassExpression'=>'$data->color',
     'type'=>'bordered condensed',
	'filter'=>$model,
	'columns'=>array(
		'paciente_id',
		'tipoTrasplante.tipo_trasplante',
		'cedula',
		'nacionalidad',
		'apellido1',
		'apellido2',
                'puntaje',
                
                /*
                array(
                   'name'=>'m_puntaje',
                   'value'=>'Puntos::calcula($data->paciente_id,$data->porcentaje_par)',
                 ),
		
		'nombre1',
		'nombre2',
		'fecha_nac',
		'peso',
		'talla',
		'sangre_id',
		'centro_id',
		'fecha_ini_prog',
		'fecha_ini_dial',
		'dialisis_id',
		'parametros_dialisis',
		'direccion',
		'telefono',
		'celular',
		'correo_electronico',
		'region_id',
		'estado_id',
		'municipio_id',
		'parroquia_id',
		'persona_contacto',
		'telefono_contacto',
		'porcentaje_par',
		'fecha__act_par',
		'enfermedad_actual',
		'antecedentes_pers',
		'accesos_vasculares',
		'genero',
		'condicion_id',
		'estatus_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
