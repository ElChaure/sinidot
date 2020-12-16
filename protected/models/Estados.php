<?php

/**
 * This is the model class for table "estados".
 *
 * The followings are the available columns in table 'estados':
 * @property integer $estado_id
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property CentrosHospitalarios[] $centrosHospitalarioses
 * @property Municipios[] $municipioses
 * @property Regiones[] $regiones
 */
class Estados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado_id', 'required'),
			array('estado_id', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('estado_id, estado', 'safe', 'on'=>'search'),
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
			'centrosHospitalarioses' => array(self::HAS_MANY, 'CentrosHospitalarios', 'estado_id'),
			'municipioses' => array(self::HAS_MANY, 'Municipios', 'estado_id'),
			'regiones' => array(self::MANY_MANY, 'Regiones', 'region_estado(estado_id, region_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'estado_id' => 'Id Estado',
			'estado' => 'Estado',
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

		$criteria->compare('estado_id',$this->estado_id);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Estados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

     	protected function afterSave(){
		parent::afterSave();

		$bit = new Bitacora;
		$bit->id_usuario_modificador = Yii::app()->user->id;
		$bit->accion = $this->isNewRecord ? 'C' : 'M';
		$bit->tabla = $this->tableName();
                $bit->ip = $_SERVER['REMOTE_ADDR'];
		$bit->save();

		return true;
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
