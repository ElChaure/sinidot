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
$hla_don=Hla_donante::model()->findAllBySql(
	"SELECT donante_id, 
                fecha_prueba,
                identificacion_prueba,
                locus_a_alelo_1,
                locus_b_alelo_1,
                locus_dr_alelo_1
		FROM hla_donante
        WHERE donante_id =".$model->donante_id);
  
        $va="No presenta valor";
        $vb="No presenta valor";
        $vdr="No presenta valor";
        $w1=Null;
        $w2=Null;
        $w2=Null;
        foreach($hla_don as $row): 
             $fecha_prueba=$row['fecha_prueba'];
             $identificacion_prueba=$row['identificacion_prueba'];
             $fecha_prueba=$row['fecha_prueba'];
             
             $locus_a_alelo_1=$row['locus_a_alelo_1'];
             $a1=Hla_a::model()->findbyPk($locus_a_alelo_1);
             if ($a1 != Null){  
                $va=$a1->locus_a_alelo_1;
                $w1="locus_a_alelo_1=".$locus_a_alelo_1;
             } 

             $where=$w1;

             $locus_b_alelo_1=$row['locus_b_alelo_1'];
             $b1=Hla_b::model()->findbyPk($locus_b_alelo_1);
             if ($b1 != Null) {
               $vb=$b1->locus_b_alelo_1;
               if($w1 !=Null) $w1=$w1." OR ";
               $w2=$sw1."locus_b_alelo_1=".$locus_b_alelo_1;
              }
             
              $where=$where.$w2;

             $locus_dr_alelo_1=$row['locus_dr_alelo_1'];
             $dr1=Hla_dr::model()->findbyPk($locus_dr_alelo_1);
             if ($dr1 !=null) {
                 $vdr=$dr1->locus_dr_alelo_1;
                 if($w1 !=Null && $w2==Null) $w1=$w1." OR ";
                 if($w1 ==Null && $w2!=Null) $w2=$w2." OR ";
                 $w3=$w1.$w2."locus_dr_alelo_1=".$locus_dr_alelo_1;  
             } 
             $where=$where.$w3; 
        endforeach;

echo "<h3><center>A:".$va." B:".$vb." DR:".$vdr."</center></h3></br>";

$va="No presenta valor";
$vb="No presenta valor";
$vdr="No presenta valor";
 
    $hla_pac=Hla_paciente::model()->findAllBySql(
	"SELECT paciente_id,
            fecha_prueba,
            identificacion_prueba,
            locus_a_alelo_1,
            locus_b_alelo_1,
            locus_dr_alelo_1
		FROM hla_paciente
        WHERE ".$where);
      foreach($hla_pac as $row): 
	         $paciente_id=$row['paciente_id'];
			 $pac=Pacientes::model()->findbyPk($paciente_id);
			 echo "<h1>".$pac->apellido1.' '.$pac->nombre1."</h1><br>";
             $fecha_prueba=$row['fecha_prueba'];
             $identificacion_prueba=$row['identificacion_prueba'];
            
			 $locus_a_alelo_1=$row['locus_a_alelo_1'];
             $a1=Hla_a::model()->findbyPk($locus_a_alelo_1);
             if ($a1 != Null) $va=$a1->locus_a_alelo_1;
               
            
             $locus_b_alelo_1=$row['locus_b_alelo_1'];
             $b1=Hla_b::model()->findbyPk($locus_b_alelo_1);
             if ($b1 != Null) $vb=$b1->locus_b_alelo_1;
                            
            
             $locus_dr_alelo_1=$row['locus_dr_alelo_1'];
             $dr1=Hla_dr::model()->findbyPk($locus_dr_alelo_1);
             if ($dr1 !=null) $vdr=$dr1->locus_dr_alelo_1;
             
             echo "<h3><center>A:".$va." B:".$vb." DR:".$vdr."</center></h3></br>";
			
			 //echo $paciente_id;
        endforeach;
			 
			 
             
     
?>
