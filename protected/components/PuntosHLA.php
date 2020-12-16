<?php
class PuntosHLA extends CComponent
{
   public static function calcula($id,$p_a,$p_b,$p_dr)
   {
	$prog = Pacientes::model()->findByPk($id);
  	$ptos = $prog->puntaje;

	$id_a=Yii::app()->getSession()->get('id_a');
        $id_b=Yii::app()->getSession()->get('id_b');
        $id_dr=Yii::app()->getSession()->get('id_dr');
        $ptoa=0;
        $ptob=0;
        $ptodr=0;
        if($p_a==$id_a) $ptoa=1;
        if($p_b==$id_b) $ptob=1;
        if($p_dr==$id_dr) $ptodr=1;

	$totptos=$ptos+$ptoa+$ptob+$ptodr;

	

         
         return $totptos;
 
   }

}

