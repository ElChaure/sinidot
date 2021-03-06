<?php

/**
 * This is the model class for table "parroquias".
 *
 * The followings are the available columns in table 'parroquias':
 * @property integer $parroquia_id
 * @property integer $municipio_id
 * @property string $parroquia
 *
 * The followings are the available model relations:
 * @property CentrosHospitalarios[] $centrosHospitalarioses
 * @property Municipios $municipio
 */
class Parroquias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parroquias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parroquia_id', 'required'),
			array('parroquia_id, municipio_id', 'numerical', 'integerOnly'=>true),
			array('parroquia', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('parroquia_id, municipio_id, parroquia', 'safe', 'on'=>'search'),
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
			'centrosHospitalarioses' => array(self::HAS_MANY, 'CentrosHospitalarios', 'parroquia_id'),
			'municipio' => array(self::BELONGS_TO, 'Municipios', 'municipio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'parroquia_id' => 'Id Parroquia',
			'municipio_id' => 'Municipio',
			'parroquia' => 'Parroquia',
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

		$criteria->compare('parroquia_id',$this->parroquia_id);
		$criteria->compare('municipio_id',$this->municipio_id);
		$criteria->compare('parroquia',$this->parroquia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Parroquias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
