<?php

/**
 * This is the model class for table "organos".
 *
 * The followings are the available columns in table 'organos':
 * @property integer $organo_id
 * @property integer $donante_id
 * @property string $codigo
 * @property string $fecha_ablacion
 * @property string $hora_ablacion
 * @property integer $rinon_id
 * @property integer $paciente_id
 * @property string $hora_asignacion
 * @property integer $estatus_id
 *
 * The followings are the available model relations:
 * @property Pacientes $paciente
 */
class Organos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'organos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('donante_id, rinon_id, paciente_id, estatus_id', 'numerical', 'integerOnly'=>true),
			array('codigo', 'length', 'max'=>25),
			array('fecha_ablacion, hora_ablacion, hora_asignacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('organo_id, donante_id, codigo, fecha_ablacion, hora_ablacion, rinon_id, paciente_id, hora_asignacion, estatus_id', 'safe', 'on'=>'search'),
			array('codigo', 'unique'),
			
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
			'organo_id' => 'Organo',
			'donante_id' => 'Donante',
			'codigo' => 'Codigo',
			'fecha_ablacion' => 'Fecha Ablacion',
			'hora_ablacion' => 'Hora Ablacion',
			'rinon_id' => 'Riñon',
			'paciente_id' => 'Paciente',
			'hora_asignacion' => 'Hora Asignacion',
			'estatus_id' => 'Estatus',
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

		$criteria->compare('organo_id',$this->organo_id);
		$criteria->compare('donante_id',$this->donante_id);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('fecha_ablacion',$this->fecha_ablacion,true);
		$criteria->compare('hora_ablacion',$this->hora_ablacion,true);
		$criteria->compare('rinon_id',$this->rinon_id);
		$criteria->compare('paciente_id',$this->paciente_id);
		$criteria->compare('hora_asignacion',$this->hora_asignacion,true);
		$criteria->compare('estatus_id',$this->estatus_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Organos the static model class
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

    $this->fecha_ablacion= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_ablacion);
    parent::beforeSave();

    return true;
    }
    else return false;
    }	

   public function afterFind()
    {
    $this->fecha_ablacion= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_ablacion);
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
