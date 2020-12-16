<?php
class Puntos extends CComponent
{
   public static function calcula($id,$parpac)
   {
	$prog = Pacientes_tiempo::model()->findByAttributes(array('paciente'=>$id));
	$ap= $prog->anios;
	$mp= $prog->meses;
	$dp= $prog->dias;
	$pptos=($ap*1.2)+($mp*0.1)+($dp*0.003);

	$dial = Pacientes_dialisis::model()->findByAttributes(array('paciente'=>$id));
	$ad= $dial->anios;
	$md= $dial->meses;
	$dd= $dial->dias;

	if($ad>3) $ad=3;
	
         $dptos=($ad*1.2)+($md*0.1)+($dd*0.003);

	 $par = $parpac;
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
         $totptos=$pptos+$dptos+$parptos;
         
         return $totptos;
 
   }

}

