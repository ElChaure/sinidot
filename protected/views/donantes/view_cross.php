<?php
$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	$model->donante_id,
);

$this->menu=array(
	array('label'=>'Regresar','url'=>array('admin')),

);
?>



<h1>Ver Pacientes Compatibles con Donante <?php echo $model->apellido1.' '.$model->nombre1; ?></h1>
<?php
$donante=$model->donante_id;
$hosp = Centros_hospitalarios::model()->findByPk($model->centro_id);
$region=$hosp->region_id;
$centro_id=$hosp->centro_id;
$reg = Regiones::model()->findByPk($region);
$countorg=Yii::app()->db->createCommand('SELECT COUNT(*) FROM organos WHERE donante_id ='.$model->donante_id.' AND estatus_id=1')->queryScalar();
$asignacion=array();

if($countorg==2){
   $asignacion[0]=array("Riñon Izquierdo");
   $asignacion[1]=array("Riñon Derecho");
}
$asignacion=array();


if ($countorg !=0){

$sqlorg="SELECT organo_id as id, 
           donante_id, 
	   codigo as Codigo, 
       EXTRACT(DAY FROM fecha_ablacion)||'-'||EXTRACT(MONTH FROM fecha_ablacion)||'-'||EXTRACT(YEAR FROM fecha_ablacion) as Fecha_Ablacion,
	   --fecha_ablacion, 
	   hora_ablacion as Hora_Ablacion, 
       organos.rinon_id,
       rinon, 	   
	   paciente_id, 
	   hora_asignacion, 
	   estatus_id
  FROM organos
  INNER JOIN rinon on rinon.rinon_id=organos.rinon_id 
  WHERE
  donante_id =".$model->donante_id." AND estatus_id=1";

  $dataProviderorg=new CSqlDataProvider($sqlorg, array(
    'totalItemCount'=>$countorg,
    'sort'=>array(
        'attributes'=>array(
	    'id', 
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));

$organo_id1=0;
$organo_id2=0;
$orgdonados=$dataProviderorg->getData();
$lin=0;
foreach($orgdonados as $row): 
    if($lin==0)
    {
    $organo_id1=$row['id'];
    } 
    else 
    {
     $organo_id2=$row['id'];
     }
    $lin=$lin+1;
endforeach;



$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$dataProviderorg,
'id'=>'organos-grid',
'columns'=>array(
       'id', 
       //'donante_id',
	'rinon',
	'codigo', 
	'fecha_ablacion', 
	'hora_ablacion', 
        //'rinon_id', 
	//'paciente_id', 
	//'hora_asignacion', 
	//'estatus_id',
   	 
),
)); 
}
  
echo $hosp->centro_id.' - '.$hosp->nombre;

?>

<?php

$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM hla_donante WHERE donante_id ='.$model->donante_id)->queryScalar();

$sql='SELECT donante_id as id, 
                fecha_prueba,
                identificacion_prueba,
                hla_donante.locus_a_alelo_1 as id_a,
				hla_a.locus_a_alelo_1 as locus_a_alelo_1,
                hla_donante.locus_b_alelo_1 as id_b,
				hla_b.locus_b_alelo_1 as locus_b_alelo_1,
				hla_donante.locus_dr_alelo_1 as id_dr,
				hla_dr.locus_dr_alelo_1 as locus_dr_alelo_1
		FROM hla_donante
		LEFT JOIN hla_a ON hla_a.locus_a_id=hla_donante.locus_a_alelo_1
		LEFT JOIN hla_b ON hla_b.locus_b_id=hla_donante.locus_b_alelo_1
		LEFT JOIN hla_dr ON hla_dr.locus_dr_id=hla_donante.locus_dr_alelo_1
        WHERE donante_id ='.$model->donante_id;
		
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
    'attributes'=>array(
	'id', 
        'fecha_prueba', 
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));

$datos=$dataProvider->getData();

foreach($datos as $row): 
    $fecha_prueba=$row['fecha_prueba'];
    $id_a  = $row['id_a'];
    $id_b  = $row['id_b'];
    $id_dr = $row['id_dr'];
endforeach;

Yii::app()->getSession()->remove('id_a');
Yii::app()->getSession()->remove('id_b');
Yii::app()->getSession()->remove('id_dr');
Yii::app()->getSession()->add('id_a', $id_a);
Yii::app()->getSession()->add('id_b', $id_b);
Yii::app()->getSession()->add('id_dr', $id_dr);
 


$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'donante-hla-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
        'type'=>'bordered condensed',
	'columns'=>array(
        'id',
        'fecha_prueba', 
	'locus_a_alelo_1', 
	'locus_b_alelo_1',
	'locus_dr_alelo_1',
),
)); 		 


$countn1=Yii::app()->db->createCommand("SELECT count(*) 
		FROM hla_paciente
		INNER JOIN pacientes ON pacientes.paciente_id=hla_paciente.paciente_id
		LEFT JOIN hla_a ON hla_a.locus_a_id=hla_paciente.locus_a_alelo_1
		LEFT JOIN hla_b ON hla_b.locus_b_id=hla_paciente.locus_b_alelo_1
		LEFT JOIN hla_dr ON hla_dr.locus_dr_id=hla_paciente.locus_dr_alelo_1
        WHERE 
		(hla_paciente.locus_a_alelo_1  in (select locus_a_id from hla_a) AND hla_paciente.locus_a_alelo_1=".$id_a.") OR
		(hla_paciente.locus_b_alelo_1  in (select locus_b_id from hla_b) AND hla_paciente.locus_b_alelo_1=".$id_b.") OR
		(hla_paciente.locus_dr_alelo_1 in (select locus_dr_id from hla_dr) AND hla_paciente.locus_dr_alelo_1=".$id_dr.") AND
		pacientes.centro_id=".$centro_id." AND pacientes.estatus_id=2")->queryScalar();

if ($countn1 !=0){

echo "<h3>Posibles Pacientes Compatibles en el Centro Hospitalario</h3></br>"; 

$sqln1="SELECT hla_paciente.paciente_id as id,
            apellido1||' '||nombre1 as paciente,
            fecha_prueba,
            identificacion_prueba,
            hla_paciente.locus_a_alelo_1 as id_a,
	        hla_a.locus_a_alelo_1 as locus_a_alelo_1,
            hla_paciente.locus_b_alelo_1 as id_b,
	        hla_b.locus_b_alelo_1 as locus_b_alelo_1,
	        hla_paciente.locus_dr_alelo_1 as id_dr,
	        hla_dr.locus_dr_alelo_1 as locus_dr_alelo_1,
	        pacientes.centro_id,
            pacientes.puntaje
	    FROM hla_paciente
		INNER JOIN pacientes ON pacientes.paciente_id=hla_paciente.paciente_id
		LEFT JOIN hla_a ON hla_a.locus_a_id=hla_paciente.locus_a_alelo_1
		LEFT JOIN hla_b ON hla_b.locus_b_id=hla_paciente.locus_b_alelo_1
		LEFT JOIN hla_dr ON hla_dr.locus_dr_id=hla_paciente.locus_dr_alelo_1
        WHERE 
		(hla_paciente.locus_a_alelo_1  in (select locus_a_id from hla_a) AND hla_paciente.locus_a_alelo_1=".$id_a.") OR
		(hla_paciente.locus_b_alelo_1  in (select locus_b_id from hla_b) AND hla_paciente.locus_b_alelo_1=".$id_b.") OR
		(hla_paciente.locus_dr_alelo_1 in (select locus_dr_id from hla_dr) AND hla_paciente.locus_dr_alelo_1=".$id_dr.") AND
		pacientes.centro_id=".$centro_id." AND pacientes.estatus_id=2 ORDER BY puntaje DESC";
   

$dataProvidern1=new CSqlDataProvider($sqln1, array(
    'totalItemCount'=>$countn1,
    'sort'=>array(
        'attributes'=>array(
	     'puntaje DESC',
             'id', 
             'fecha_prueba', 
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));

$asig=$dataProvidern1->getData();
$linea=0;
foreach($asig as $row): 
       if($linea==0){
	      $asignacion[$linea]=array("Rinon Izquierdo ",$row['id'],$row['paciente']);
		}
        else
      	{
	      $asignacion[$linea]=array("Rinon Derecho ",$row['id'],$row['paciente']);
		}	
	   $linea=$linea+1;
endforeach;



$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$dataProvidern1,
'id'=>'paciente-n1-hla-grid',
'columns'=>array(
        'id',
        'paciente', 
	'locus_a_alelo_1', 
	'locus_b_alelo_1',
	'locus_dr_alelo_1',
	'puntaje',
    array(
         'name'=>'Puntaje + HLA',
         'value'=>'PuntosHLA::calcula($data["id"],$data["locus_a_alelo_1"],$data["locus_b_alelo_1"],$data["locus_dr_alelo_1"])',
         ),
    array(
	   'name'=>'','value'=>'CHtml::checkBox("cid[]",null,array("value"=>$data["id"],"id"=>"cid_".$data["id"]))',
	   'type'=>'raw',
	   'htmlOptions'=>array('width'=>5),
	   //'visible'=>false,
	),		 
),
)); 
}



$countn2=Yii::app()->db->createCommand("SELECT count(*) 
		FROM hla_paciente
		INNER JOIN pacientes ON pacientes.paciente_id=hla_paciente.paciente_id
		INNER JOIN centros_hospitalarios ON centros_hospitalarios.centro_id=pacientes.centro_id
		LEFT JOIN hla_a ON hla_a.locus_a_id=hla_paciente.locus_a_alelo_1
		LEFT JOIN hla_b ON hla_b.locus_b_id=hla_paciente.locus_b_alelo_1
		LEFT JOIN hla_dr ON hla_dr.locus_dr_id=hla_paciente.locus_dr_alelo_1
        WHERE 
		(hla_paciente.locus_a_alelo_1  in (select locus_a_id from hla_a) AND hla_paciente.locus_a_alelo_1=".$id_a.") OR
		(hla_paciente.locus_b_alelo_1  in (select locus_b_id from hla_b) AND hla_paciente.locus_b_alelo_1=".$id_b.") OR
		(hla_paciente.locus_dr_alelo_1 in (select locus_dr_id from hla_dr) AND hla_paciente.locus_dr_alelo_1=".$id_dr.") AND
		pacientes.centro_id <>".$centro_id." AND
		centros_hospitalarios.region_id=".$region." AND pacientes.estatus_id=2")->queryScalar();

if (($countn1 =0 && $countn2 !=0) || ($countn1 < 2 && $countorg>1)){
//echo "</br>Pacientes a Nivel Regional";
//echo $reg->region;

echo "<h3>Posibles Pacientes Compatibles a Nivel de la ".$reg->region."</h3>"; 


$sqln2="SELECT hla_paciente.paciente_id as id,
            apellido1||' '||nombre1 as paciente,
            fecha_prueba,
            identificacion_prueba,
            hla_paciente.locus_a_alelo_1 as id_a,
	    hla_a.locus_a_alelo_1 as locus_a_alelo_1,
            hla_paciente.locus_b_alelo_1 as id_b,
	    hla_b.locus_b_alelo_1 as locus_b_alelo_1,
	    hla_paciente.locus_dr_alelo_1 as id_dr,
	    hla_dr.locus_dr_alelo_1 as locus_dr_alelo_1,
	    pacientes.centro_id,
            pacientes.region_id,
            pacientes.puntaje
	FROM hla_paciente
		INNER JOIN pacientes ON pacientes.paciente_id=hla_paciente.paciente_id
		INNER JOIN centros_hospitalarios ON centros_hospitalarios.centro_id=pacientes.centro_id
		LEFT JOIN hla_a ON hla_a.locus_a_id=hla_paciente.locus_a_alelo_1
		LEFT JOIN hla_b ON hla_b.locus_b_id=hla_paciente.locus_b_alelo_1
		LEFT JOIN hla_dr ON hla_dr.locus_dr_id=hla_paciente.locus_dr_alelo_1
        WHERE 
		(hla_paciente.locus_a_alelo_1  in (select locus_a_id from hla_a) AND hla_paciente.locus_a_alelo_1=".$id_a.") OR
		(hla_paciente.locus_b_alelo_1  in (select locus_b_id from hla_b) AND hla_paciente.locus_b_alelo_1=".$id_b.") OR
		(hla_paciente.locus_dr_alelo_1 in (select locus_dr_id from hla_dr) AND hla_paciente.locus_dr_alelo_1=".$id_dr.") AND
		pacientes.centro_id <>".$centro_id." AND
		centros_hospitalarios.region_id=".$region." AND pacientes.estatus_id=2 ORDER BY puntaje DESC";
   

$dataProvidern2=new CSqlDataProvider($sqln2, array(
    'totalItemCount'=>$countn2,
    'sort'=>array(
        'attributes'=>array(
	     'puntaje DESC',
             'id', 
             'fecha_prueba', 
        ),
    ),
    'pagination'=>array(
        'pageSize'=>25,
    ),
));

$asig=$dataProvidern2->getData();
//$linea=$linea-1;
foreach($asig as $row): 
	   if($linea==0){
	      $asignacion[$linea]=array("Rinon Izquierdo ",$row['id'],$row['paciente']);
		}
        else
      	{
	      $asignacion[$linea]=array("Rinon Derecho ",$row['id'],$row['paciente']);
		}	
	   $linea=$linea++;
endforeach;

$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$dataProvidern2,
'id'=>'paciente-n2-hla-grid',
'columns'=>array(
        'id',
        'paciente', 
	'locus_a_alelo_1', 
	'locus_b_alelo_1',
	'locus_dr_alelo_1',
	'puntaje',
    array(
         'name'=>'Puntaje + HLA',
         'value'=>'PuntosHLA::calcula($data["id"],$data["locus_a_alelo_1"],$data["locus_b_alelo_1"],$data["locus_dr_alelo_1"])',
    ),
	array(
	   'name'=>'','value'=>'CHtml::checkBox("cid[]",null,array("value"=>$data["id"],"id"=>"cid_".$data["id"]))',
	   'type'=>'raw',
	   'htmlOptions'=>array('width'=>5),
	   //'visible'=>false,
	),		 	 
		 
),
));
}

if ($countn1 =0 && $countn2 =0||$countn1 =0 && $countn2 =0 && $countorg>1 ){
$countn3=Yii::app()->db->createCommand("SELECT count(*) 
		FROM hla_paciente
		INNER JOIN pacientes ON pacientes.paciente_id=hla_paciente.paciente_id
		INNER JOIN centros_hospitalarios ON centros_hospitalarios.centro_id=pacientes.centro_id
		LEFT JOIN hla_a ON hla_a.locus_a_id=hla_paciente.locus_a_alelo_1
		LEFT JOIN hla_b ON hla_b.locus_b_id=hla_paciente.locus_b_alelo_1
		LEFT JOIN hla_dr ON hla_dr.locus_dr_id=hla_paciente.locus_dr_alelo_1
                WHERE 
		(hla_paciente.locus_a_alelo_1  in (select locus_a_id from hla_a) AND hla_paciente.locus_a_alelo_1=".$id_a.") OR
		(hla_paciente.locus_b_alelo_1  in (select locus_b_id from hla_b) AND hla_paciente.locus_b_alelo_1=".$id_b.") OR
		(hla_paciente.locus_dr_alelo_1 in (select locus_dr_id from hla_dr) AND hla_paciente.locus_dr_alelo_1=".$id_dr.") AND
		pacientes.estatus_id=2")->queryScalar();

$sqln3="SELECT hla_paciente.paciente_id as id,
            apellido1||' '||nombre1 as paciente,
            fecha_prueba,
            identificacion_prueba,
            hla_paciente.locus_a_alelo_1 as id_a,
	    hla_a.locus_a_alelo_1 as locus_a_alelo_1,
            hla_paciente.locus_b_alelo_1 as id_b,
	    hla_b.locus_b_alelo_1 as locus_b_alelo_1,
	    hla_paciente.locus_dr_alelo_1 as id_dr,
	    hla_dr.locus_dr_alelo_1 as locus_dr_alelo_1,
	    pacientes.centro_id,
            pacientes.region_id,
            pacientes.puntaje
	FROM hla_paciente
		INNER JOIN pacientes ON pacientes.paciente_id=hla_paciente.paciente_id
		INNER JOIN centros_hospitalarios ON centros_hospitalarios.centro_id=pacientes.centro_id
		LEFT JOIN hla_a ON hla_a.locus_a_id=hla_paciente.locus_a_alelo_1
		LEFT JOIN hla_b ON hla_b.locus_b_id=hla_paciente.locus_b_alelo_1
		LEFT JOIN hla_dr ON hla_dr.locus_dr_id=hla_paciente.locus_dr_alelo_1
        WHERE 
		(hla_paciente.locus_a_alelo_1  in (select locus_a_id from hla_a) AND hla_paciente.locus_a_alelo_1=".$id_a.") OR
		(hla_paciente.locus_b_alelo_1  in (select locus_b_id from hla_b) AND hla_paciente.locus_b_alelo_1=".$id_b.") OR
		(hla_paciente.locus_dr_alelo_1 in (select locus_dr_id from hla_dr) AND hla_paciente.locus_dr_alelo_1=".$id_dr.") AND
		pacientes.estatus_id=2 ORDER BY puntaje DESC";
   

$dataProvidern3=new CSqlDataProvider($sqln3, array(
    'totalItemCount'=>$countn3,
    'sort'=>array(
        'attributes'=>array(
	     'puntaje DESC',
             'id', 
             'fecha_prueba', 
        ),
    ),
    'pagination'=>array(
        'pageSize'=>25,
    ),
));
$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$dataProvidern3,
'id'=>'paciente-n3-hla-grid',
'columns'=>array(
        'id',
        'paciente', 
	'locus_a_alelo_1', 
	'locus_b_alelo_1',
	'locus_dr_alelo_1',
	'puntaje',
    array(
         'name'=>'Puntaje + HLA',
         'value'=>'PuntosHLA::calcula($data["id"],$data["locus_a_alelo_1"],$data["locus_b_alelo_1"],$data["locus_dr_alelo_1"])',
    ),
	array(
	   'name'=>'','value'=>'CHtml::checkBox("cid[]",null,array("value"=>$data["id"],"id"=>"cid_".$data["id"]))',
	   'type'=>'raw',
	   'htmlOptions'=>array('width'=>5),
	   //'visible'=>false,
	),			 
),
));
}

echo "<h3>Asignación de Organos a los siguientes Pacientes:</h3></br>"; 
$paciente_id1=0;
$paciente_id2=0;
$lin=0;
foreach ($asignacion as $valor) {
    $rin=$valor[0];
    $id_pac=$valor[1];
    $nompac=$valor[2];
    echo $rin." - ".$id_pac." - ".$nompac."</br>";
    if($lin==0)
    {
    $paciente_id1=$id_pac;
    } 
    else 
    {
     $paciente_id2=$id_pac;
     }
    $lin=$lin+1;
	
}

$orgdon=$dataProviderorg->getData();
$asipac=$asignacion;
Yii::app()->getSession()->add('orgdon', $orgdon);
Yii::app()->getSession()->add('asipac', $asipac);


$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'donantes-organos-form',
	'enableAjaxValidation'=>false,
        'action'=>array('asignacion'),
)); 
echo  CHtml::hiddenField('organo1',$organo_id1); 
echo  CHtml::hiddenField('organo2',$organo_id2);
echo  CHtml::hiddenField('paciente1',$paciente_id1);  
echo  CHtml::hiddenField('paciente2',$paciente_id2);  
$this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>'Confirma Asignación',
));
$this->endWidget();
?>
