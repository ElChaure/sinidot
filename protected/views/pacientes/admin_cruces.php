<?php
$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Crossmatch',
);

$this->menu=array(
	array('label'=>'Regresar', 'url'=>array('admin_activos')),
);


?>

<h1>Pruebas Cruzadas (Crossmatch)</h1>
<h2>Datos Donante</h2>

<?php
$conn = Yii::app()->db;
$q0="SELECT 
  donantes.donante_id as donante_id, 
  donantes.cedula as cedula, 
  donantes.apellido1 as apellido1, 
  donantes.apellido2 as apellido2, 
  donantes.nombre1 as nombre1, 
  donantes.nombre2 as nombre2, 
  donantes.centro_id as centro_id,
  donantes.fecha_muerte as fecha_muerte, 
  hla_donante.locus_a_alelo_1 as locus_a_alelo_1, 
  hla_donante.locus_a_alelo_2 as locus_a_alelo_2, 
  hla_donante.locus_b_alelo_1_ as locus_b_alelo_1_, 
  hla_donante.locus_b_alelo_2 as locus_b_alelo_2, 
  hla_donante.locus_dr_alelo_1 as locus_dr_alelo_1, 
  hla_donante.locus_dr_alelo_2 as locus_dr_alelo_2
FROM 
  public.donantes, 
  public.hla_donante
WHERE 
  donantes.donante_id = hla_donante.donante_id AND
  donantes.fecha_muerte >= current_date-1;";
$comm1 = Yii::app()->db->createCommand($q0);
$row = $comm1->queryRow();
$res = array();
foreach ($row as $key=>$val) {
        $res[] = array('label'=>$key,'value'=>$val);
}
	
$this->widget('zii.widgets.CDetailView', array(
'data' => array(), //to avoid error
'attributes' => $res,
));



?>

<h2>Datos Pacientes</h2>

<?php
$q1="SELECT 
  pacientes.paciente_id, 
  pacientes.apellido1, 
  pacientes.apellido2, 
  pacientes.nombre1, 
  pacientes.nombre2, 
  pacientes.estatus_id, 
  pacientes.puntaje, 
  hla_paciente.locus_a_alelo_1, 
  hla_paciente.locus_a_alelo_2, 
  hla_paciente.locus_b_alelo_1_, 
  hla_paciente.locus_b_alelo_2, 
  hla_paciente.locus_dr_alelo_1, 
  hla_paciente.locus_dr_alelo_2
FROM 
  public.pacientes, 
  public.hla_paciente
WHERE 
  pacientes.paciente_id = hla_paciente.paciente_id AND
  (estatus_id=2 OR estatus_id=6) AND 
  puntaje > 0
ORDER BY pacientes.puntaje DESC;";
$comm1 = Yii::app()->db->createCommand($q1);
$row = $comm1->queryRow();

$res = array();
foreach ($row as $key=>$val) {
        $res[] = array('label'=>$key,'value'=>$val);
}
	
$this->widget('zii.widgets.CDetailView', array(
'data' => array(), //to avoid error
'attributes' => $res,
));

?>

