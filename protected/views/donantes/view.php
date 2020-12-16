<?php
$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	$model->donante_id,
);

$this->menu=array(
	//array('label'=>'Listar Donantes','url'=>array('index')),
	array('label'=>'Crear Donante','url'=>array('create')),
	array('label'=>'Actualizar Donante','url'=>array('update','id'=>$model->donante_id)),
	//array('label'=>'Eliminar Donante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->donante_id),'confirm'=>'¿Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Donantes','url'=>array('admin')),
	array('label'=>'Entrega de Suero', 'url'=>array('suero_donante/create', 'id'=>$model->donante_id)),
	array('label'=>'Histocompatibilidad', 'url'=>array('hla_donante/create', 'id'=>$model->donante_id)),
	array('label'=>'Procura de Organos', 'url'=>array('organos/create', 'id'=>$model->donante_id)),	
);
?>

<h1>Ver Donantes #<?php echo $model->donante_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'donante_id',
        'nac.nacionalidad',
		'cedula',
		'apellido1',
		'apellido2',
		'nombre1',
		'nombre2',
		'fecha_nacimiento',
		'causa_muerte',
		'fecha_muerte',
		'tipo_donante.tipo_donante',
		'centro.nombre',
		'peso',
		'talla',
		'gen.genero',
		'diagnostico',
		'antecedentes_personales_patologicos',
		'antecedentes_epidemiologicos',
		'examen_fisico',
		'hemodinamia',
		'diuresis',
		'proceso_infeccioso',
		'tratamiento_antibiotico',
		'sangre.grupo_sanguineo',
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
                'est.estatus',
	),
)); ?>
</br>
<h2>HLA del Donante</h2>

 <?php 
$gridDataProvider=new CActiveDataProvider('Hla_donante', array(
    'criteria'=>array(
        'condition'=>'donante_id='.$model->donante_id,
        'order'=>'donante_id asc',
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
 
    
    $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pacientes-hla-grid',
	'dataProvider'=>$gridDataProvider,
        'type'=>'bordered condensed',
	
    'columns'=>array(
		//'paciente_id',
		'fecha_prueba',
		'identificacion_prueba',
		array('name'=>'locus_a_alelo_1',
              'header'=>'Locus A Alelo 1',
			  'type'=>'raw',
			  'value'=>'($data->locus_a_alelo_1 != "")?$data->laa1->locus_a_alelo_1:""',
         ),
		
		
		array('name'=>'locus_b_alelo_1_',
                    'header'=>'Locus B Alelo 1',
					'type'=>'raw',
					'value'=>'($data->locus_b_alelo_1 != "")?$data->lba1->locus_b_alelo_1:""',
         ),		
		
		array('name'=>'locus_dr_alelo_1',
                    'header'=>'Locus DR Alelo 1',
					'type'=>'raw',
					'value'=>'($data->locus_dr_alelo_1 != "")?$data->ldra1->locus_dr_alelo_1:""',
         ),		
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view}{update}{delete}',
                        'buttons'=>array(
                                'view' => array(
                                  'url'=>'Yii::app()->createUrl("hla_donante/view", array("id"=>$data->donante_id))',
                                ),       
                                'update' => array(
                                  'url'=>'Yii::app()->createUrl("hla_donante/update", array("id"=>$data->donante_id))',
                                ),
                                'delete' => array(
                                  'url'=>'Yii::app()->createUrl("hla_donante/delete", array("id"=>$data->donante_id,"command"=>"delete"))',
                                ),
                        ),

                        
		),
	),
)); ?>
</br>
<h2>Entregas de Suero del Donante</h2>

 <?php 
$gridDataProvider=new CActiveDataProvider('Suero_donante', array(
    'criteria'=>array(
        'condition'=>'donante_id='.$model->donante_id,
        'order'=>'donante_id asc',
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
 
    //$this->widget('zii.widgets.grid.CGridView', array(
    //'dataProvider'=>$gridDataProvider,
    //'template'=>"{items}",
    $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pacientes-suero-grid',
	'dataProvider'=>$gridDataProvider,
        'type'=>'bordered condensed',
	//'filter'=>$model,
    'columns'=>array(
		//'suero_pac_id',
		//'paciente_id',
		'fecha_entrega',
		'identificacion_muestra',
		'identificacion_prueba',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view}{update}{delete}',
                        'buttons'=>array(
                                'view' => array(
                                  'url'=>'Yii::app()->createUrl("suero_donante/view", array("id"=>$data->suero_don_id))',
                                ),       
                                'update' => array(
                                  'url'=>'Yii::app()->createUrl("suero_donante/update", array("id"=>$data->suero_don_id))',
                                ),
                                'delete' => array(
                                  'url'=>'Yii::app()->createUrl("suero_donante/delete", array("id"=>$data->suero_don_id,"command"=>"delete"))',
                                ),
                        ),

                        
		),
	),
)); ?>
</br>
<h2>Organos Procurados</h2>

 <?php 
$gridDataProvider=new CActiveDataProvider('Organos', array(
    'criteria'=>array(
        'condition'=>'donante_id='.$model->donante_id,
        'order'=>'donante_id asc',
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
    
    $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'donante-organo-grid',
	'dataProvider'=>$gridDataProvider,
        'type'=>'bordered condensed',
	//'filter'=>$model,
    'columns'=>array(
		'organo_id',
		//'donante_id',
		'codigo',
		'fecha_ablacion',
		'hora_ablacion',
		//'rinon_id',
		'paciente_id',
		'hora_asignacion',
		'estatus_id',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view}{update}{delete}',
                        'buttons'=>array(
                                'view' => array(
                                  'url'=>'Yii::app()->createUrl("organos/view", array("id"=>$data->organo_id))',
                                ),       
                                'update' => array(
                                  'url'=>'Yii::app()->createUrl("organos/update", array("id"=>$data->organo_id))',
                                ),

                        ),

                        
		),
	),
)); ?>

