<?php
class UserFilter extends CFormModel
{
    public $estatus_id;
    public $puntaje;


    // All these attributes must be declared as 'safe'
    public function rules()
    {
        return array(
            array('estatus_id,puntaje', 'safe'),
        );
    }


    public function search2()
    {
        $criteria = new CDbCriteria;
        $criteria->addCondition('estatus_id=2');
		$criteria->addCondition('puntaje >0');
		
        return new CActiveDataProvider('Pacientes', array(
            'criteria' => $criteria,
        ));
    }
}