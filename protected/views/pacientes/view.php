<?php
$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->paciente_id,
);

$this->menu=array(
	//array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Ingresar Paciente', 'url'=>array('create')),
	array('label'=>'Actualizar Paciente', 'url'=>array('update', 'id'=>$model->paciente_id)),
	////array('label'=>'Eliminar Pacientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->paciente_id),'confirm'=>'Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionar Pacientes', 'url'=>array('admin')),
	array('label'=>'Examenes del Paciente', 'url'=>array('examenes/create', 'id'=>$model->paciente_id)),
	array('label'=>'Entrega de Suero', 'url'=>array('suero_paciente/create', 'id'=>$model->paciente_id)),
	array('label'=>'Histocompatibilidad', 'url'=>array('hla_paciente/create', 'id'=>$model->paciente_id)),
);
?>

<h1>Ver Paciente #<?php echo $model->paciente_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
				'paciente_id',
		//'tipo_trasplante_id',
		'tipoTrasplante.tipo_trasplante',
		'cedula',
		'nac.nacionalidad',
		'apellido1',
		'apellido2',
		'nombre1',
		'nombre2',
		'fecha_nac',
		'gen.genero',
		'peso',
		'talla',
		'sangre.grupo_sanguineo',
		'centro.nombre',
		'fecha_ini_prog',
		'fecha_ini_dial',
		'dial.tipo_dialisis',
		'parametros_dialisis',
		'direccion',
		'telefono',
		'celular',
		'correo_electronico',
		'reg.region',
		'est.estado',
		'mun.municipio',
		'par.parroquia',
		'persona_contacto',
		'telefono_contacto',
		'porcentaje_par',
		'fecha__act_par',
		'enfermedad_actual',
		'antecedentes_pers',
		'accesos_vasculares',
		'condicion.condicion',
		'estatus.estatus',
	),
)); ?>

</br>

<h1>Puntaje Paciente</h1>
<?php 
$prog = Pacientes_tiempo::model()->findByAttributes(array('paciente'=>$model->paciente_id));
$ap= $prog->anios;
$mp= $prog->meses;
$dp= $prog->dias;
$pptos=($ap*1.2)+($mp*0.1)+($dp*0.003);
echo "Puntos por ingreso al programa: ".$pptos;
echo "<br>";

$dial = Pacientes_dialisis::model()->findByAttributes(array('paciente'=>$model->paciente_id));
$ad= $dial->anios;
$md= $dial->meses;
$dd= $dial->dias;
if($ad>3) $ad=3;
$dptos=($ad*1.2)+($md*0.1)+($dd*0.003);
echo "Puntos por inicio de dialisis: ".$dptos;
echo "<br>";

$par = $model->porcentaje_par;
if($par<30){
   $parptos=0;
}
else if($par >=30 && $par < 50){
   $parptos=0.5;
}
else if($par >=50 && $par < 80){
   $parptos=1;
}
else {
   $parptos=2;
}
echo "Puntos por PAR: ".$parptos;
echo "<br>";
$totptos=$pptos+$dptos+$parptos;
echo "Total Parcial de Puntos: ".$totptos;
echo "<br>";

?>
<br>
<h2>Examenes del Paciente</h2>
 <?php 
$gridDataProvider=new CActiveDataProvider('Examenes', array(
    'criteria'=>array(
        'condition'=>'paciente_id='.$model->paciente_id,
        'order'=>'examen_id asc',
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
 
    //$this->widget('zii.widgets.grid.CGridView', array(
    //'dataProvider'=>$gridDataProvider,
    //'template'=>"{items}",

    $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pacientes-examenes-grid',
	'dataProvider'=>$gridDataProvider,
        'type'=>'bordered condensed',
	//'filter'=>$model,
	'columns'=>array(
		//'examen_id',
		//'paciente_id',
		'fecha_examen',
		//'aghbs_res.aghbs',
                array(
                   'name'=>'aghbs',
                   'value'=>'$data->aghbs_res->valor',
                   'filter' => CHtml::listData(Posinega::model()->findAll(), 'id', 'valor'),
                 ), 
		//'anticore_res.anticore',
                array(
                   'name'=>'anticore',
                   'value'=>'$data->anticore_res->valor',
                   'filter' => CHtml::listData(Posinega::model()->findAll(), 'id', 'valor'),
                 ),  
		//'hvc_res.hvc',
                array(
                   'name'=>'hvc',
                   'value'=>'$data->hvc_res->valor',
                   'filter' => CHtml::listData(Posinega::model()->findAll(), 'id', 'valor'),
                 ),  
		//'acaghbs_res.acaghbs',
                array(
                   'name'=>'acaghbs',
                   'value'=>'$data->acaghbs_res->valor',
                   'filter' => CHtml::listData(Posinega::model()->findAll(), 'id', 'valor'),
                 ),  
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view}{update}',
                        'buttons'=>array(
                                'view' => array(
								  'label'=>'Ver Datos del Examen',
                                  'icon'=>'icon-eye-open',
                                  'url'=>'Yii::app()->createUrl("examenes/view", array("id"=>$data->examen_id))',
								  'options'=>array(
                                     'class'=>'btn btn-info',
                                    ),
                                ),       
                                'update' => array(
                                'label'=>'Actualiza Datos del Examen',
                                'icon'=>'pencil white',								
                                  'url'=>'Yii::app()->createUrl("examenes/update", array("id"=>$data->examen_id))',
                                  'options'=>array(
                                     'class'=>'btn btn-small btn-success',
                                ),								  
                                ),
                                /*'delete' => array(
                                  'url'=>'Yii::app()->createUrl("examenes/delete", array("id"=>$data->examen_id,"command"=>"delete"))',
                                ),*/
                        ),

                        
		),
	),
));
?>
</br>
<h2>HLA del Paciente</h2>

 <?php 
$gridDataProvider=new CActiveDataProvider('Hla_paciente', array(
    'criteria'=>array(
        'condition'=>'paciente_id='.$model->paciente_id,
        'order'=>'paciente_id asc',
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
	        array('name'=>'locus_b_alelo_1',
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
                        'template'=>'{view}{update}',
                        'buttons'=>array(
                                'view' => array(
								  'label'=>'Ver Datos del HLA del Paciente',
                                  'icon'=>'icon-eye-open',
                                  'url'=>'Yii::app()->createUrl("hla_paciente/view", array("id"=>$data->paciente_id))',
								  'options'=>array(
                                     'class'=>'btn btn-info',
                                  ),
                                ),       
                                'update' => array(
								  'label'=>'Actualiza Datos del HLA del Paciente',
                                  'icon'=>'pencil white',		
                                  'url'=>'Yii::app()->createUrl("hla_paciente/update", array("id"=>$data->paciente_id))',
								  'options'=>array(
                                     'class'=>'btn btn-small btn-success',
                                ),
                                ),
                                /* 'delete' => array(
                                  'url'=>'Yii::app()->createUrl("hla_paciente/delete", array("id"=>$data->paciente_id,"command"=>"delete"))',
                                ),*/
                        ),

                        
		),
	),
)); ?>
</br>
<h2>Entregas de Suero del Paciente</h2>

 <?php 
$gridDataProvider=new CActiveDataProvider('Suero_paciente', array(
    'criteria'=>array(
        'condition'=>'paciente_id='.$model->paciente_id,
        'order'=>'paciente_id asc',
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
                        'template'=>'{view}{update}',
                        'buttons'=>array(
                                'view' => array(
								  'label'=>'Ver Datos de Entrega de Suero',
                                  'icon'=>'icon-eye-open',
                                  'url'=>'Yii::app()->createUrl("suero_paciente/view", array("id"=>$data->suero_pac_id))',
								  'options'=>array(
                                     'class'=>'btn btn-info',
                                  ),
                                ),       
                                'update' => array(
								  'label'=>'Actualiza Datos de Entrega de Suero',
                                  'icon'=>'pencil white',
                                  'url'=>'Yii::app()->createUrl("suero_paciente/update", array("id"=>$data->suero_pac_id))',
								  'options'=>array(
                                     'class'=>'btn btn-small btn-success',
                                ),
                                ),
                                /* 'delete' => array(
                                  'url'=>'Yii::app()->createUrl("suero_paciente/delete", array("id"=>$data->suero_pac_id,"command"=>"delete"))',
                                ), */
                        ),

                        
		),
	),
)); ?>
