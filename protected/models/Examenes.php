<?php

/**
 * This is the model class for table "examenes".
 *
 * The followings are the available columns in table 'examenes':
 * @property integer $examen_id
 * @property integer $paciente_id
 * @property string $fecha_examen
 * @property integer $aghbs
 * @property integer $anticore
 * @property integer $hvc
 * @property integer $acaghbs
 *
 * The followings are the available model relations:
 * @property Pacientes $paciente
 */
class Examenes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'examenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paciente_id, fecha_examen', 'required'),
			array('paciente_id, aghbs, anticore, hvc, acaghbs', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('examen_id, paciente_id, fecha_examen, aghbs, anticore, hvc, acaghbs', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'paciente' => array(self::BELONGS_TO, 'Pacientes', 'paciente_id'),
                        'aghbs_res' => array(self::BELONGS_TO, 'Posinega', 'aghbs'),
                        'anticore_res' => array(self::BELONGS_TO, 'Posinega', 'anticore'),
                        'hvc_res' => array(self::BELONGS_TO, 'Posinega', 'hvc'),
                        'acaghbs_res' => array(self::BELONGS_TO, 'Posinega', 'acaghbs'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'examen_id' => 'Id Examen',
			'paciente_id' => 'Paciente',
			'fecha_examen' => 'Fecha de Examen',
			'aghbs' => 'AgHbs',
			'anticore' => 'Anticore',
			'hvc' => 'HVC',
			'acaghbs' => 'AcAgHbs',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('examen_id',$this->examen_id);
		$criteria->compare('paciente_id',$this->paciente_id);
		$criteria->compare('fecha_examen',$this->fecha_examen,true);
		$criteria->compare('aghbs',$this->aghbs);
		$criteria->compare('anticore',$this->anticore);
		$criteria->compare('hvc',$this->hvc);
		$criteria->compare('acaghbs',$this->acaghbs);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Examenes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
		   public function beforeSave()
    {
    if(parent::beforeSave())
    {
  
     $bit = new Bitacora;
     $bit->id_usuario_modificador = Yii::app()->user->id;
     $bit->accion = $this->isNewRecord ? 'C' : 'M';
     $bit->tabla = $this->tableName();
     $bit->ip = $_SERVER['REMOTE_ADDR'];
     $bit->save();
  
    $this->fecha_examen= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_examen);
    parent::beforeSave();

    return true;
    }
    else return false;
    }


    public function afterFind()
    {
    $this->fecha_examen= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_examen);
    parent::afterFind();
    }	

    protected function beforeDelete() {
                parent::beforeDelete();
                $bit = new Bitacora;
		$bit->id_usuario_modificador = Yii::app()->user->id;
		$bit->accion = 'E';
		$bit->tabla = $this->tableName();
                $bit->ip = $_SERVER['REMOTE_ADDR'];
		$bit->save();
        } 

	
}
