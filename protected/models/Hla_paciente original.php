<?php

/**
 * This is the model class for table "hla_paciente".
 *
 * The followings are the available columns in table 'hla_paciente':
 * @property integer $paciente_id
 * @property string $fecha_prueba
 * @property string $identificacion_prueba
 * @property string $locus_a_alelo_1
 * @property string $locus_a_alelo_2
 * @property string $locus_b_alelo_1_
 * @property string $locus_b_alelo_2
 * @property string $locus_dr_alelo_1
 * @property string $locus_dr_alelo_2
 *
 * The followings are the available model relations:
 * @property Pacientes $paciente
 */
class Hla_paciente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hla_paciente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paciente_id', 'required'),
			array('paciente_id', 'numerical', 'integerOnly'=>true),
			array('identificacion_prueba', 'length', 'max'=>30),
			array('locus_a_alelo_1, locus_a_alelo_2, locus_b_alelo_1_, locus_b_alelo_2, locus_dr_alelo_1, locus_dr_alelo_2', 'length', 'max'=>20),
			array('fecha_prueba', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('paciente_id, fecha_prueba, identificacion_prueba, locus_a_alelo_1, locus_a_alelo_2, locus_b_alelo_1_, locus_b_alelo_2, locus_dr_alelo_1, locus_dr_alelo_2', 'safe', 'on'=>'search'),
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
			'laa1' => array(self::BELONGS_TO, 'Hla_a', 'locus_a_alelo_1'),
			'laa2' => array(self::BELONGS_TO, 'Hla_a', 'locus_a_alelo_2'),
			'lba1' => array(self::BELONGS_TO, 'Hla_b', 'locus_b_alelo_1_'),
			'lba2' => array(self::BELONGS_TO, 'Hla_b', 'locus_b_alelo_2'),
			'ldra1' => array(self::BELONGS_TO, 'Hla_dr', 'locus_dr_alelo_1'),
			'ldra2' => array(self::BELONGS_TO, 'Hla_dr', 'locus_dr_alelo_2'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'paciente_id' => 'Paciente',
			'fecha_prueba' => 'Fecha de Prueba',
			'identificacion_prueba' => 'Identificacion de Prueba',
			'locus_a_alelo_1' => 'Locus A Alelo 1',
			'locus_a_alelo_2' => 'Locus A Alelo 2',
			'locus_b_alelo_1_' => 'Locus B Alelo 1',
			'locus_b_alelo_2' => 'Locus B Alelo 2',
			'locus_dr_alelo_1' => 'Locus DR Alelo 1',
			'locus_dr_alelo_2' => 'Locus DR Alelo 2',
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

		$criteria->compare('paciente_id',$this->paciente_id);
		$criteria->compare('fecha_prueba',$this->fecha_prueba,true);
		$criteria->compare('identificacion_prueba',$this->identificacion_prueba,true);
		$criteria->compare('locus_a_alelo_1',$this->locus_a_alelo_1,true);
		$criteria->compare('locus_a_alelo_2',$this->locus_a_alelo_2,true);
		$criteria->compare('locus_b_alelo_1_',$this->locus_b_alelo_1_,true);
		$criteria->compare('locus_b_alelo_2',$this->locus_b_alelo_2,true);
		$criteria->compare('locus_dr_alelo_1',$this->locus_dr_alelo_1,true);
		$criteria->compare('locus_dr_alelo_2',$this->locus_dr_alelo_2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hla_paciente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	   public function beforeSave()
    {
    if(parent::beforeSave())
    {

    $this->fecha_prueba= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_prueba);
    parent::beforeSave();

    return true;
    }
    else return false;
    }


    public function afterFind()
    {
    $this->fecha_prueba= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_prueba);
    parent::afterFind();
    }	
	
	
	
}
