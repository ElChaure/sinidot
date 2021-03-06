<?php

/**
 * This is the model class for table "suero_paciente".
 *
 * The followings are the available columns in table 'suero_paciente':
 * @property integer $suero_pac_id
 * @property integer $paciente_id
 * @property string $fecha_entrega
 * @property string $identificacion_muestra
 * @property string $identificacion_prueba
 *
 * The followings are the available model relations:
 * @property Pacientes $paciente
 */
class Suero_paciente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suero_paciente';
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
			array('identificacion_muestra, identificacion_prueba', 'length', 'max'=>30),
			array('fecha_entrega', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('suero_pac_id, paciente_id, fecha_entrega, identificacion_muestra, identificacion_prueba', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'suero_pac_id' => 'Suero Pac',
			'paciente_id' => 'Paciente',
			'fecha_entrega' => 'Fecha Entrega',
			'identificacion_muestra' => 'Identificacion Muestra',
			'identificacion_prueba' => 'Identificacion Prueba',
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

		$criteria->compare('suero_pac_id',$this->suero_pac_id);
		$criteria->compare('paciente_id',$this->paciente_id);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('identificacion_muestra',$this->identificacion_muestra,true);
		$criteria->compare('identificacion_prueba',$this->identificacion_prueba,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Suero_paciente the static model class
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


    $this->fecha_entrega= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_entrega);
    parent::beforeSave();

    return true;
    }
    else return false;
    }


    public function afterFind()
    {
    $this->fecha_entrega= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_entrega);
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
