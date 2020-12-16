<?php

/**
 * This is the model class for table "tipos_trasplantes".
 *
 * The followings are the available columns in table 'tipos_trasplantes':
 * @property integer $tipo_trasplante_id
 * @property string $tipo_trasplante
 *
 * The followings are the available model relations:
 * @property Usuarios[] $usuarioses
 * @property Pacientes[] $pacientes
 */
class Tipos_trasplantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipos_trasplantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_trasplante', 'required'),
			array('tipo_trasplante', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tipo_trasplante_id, tipo_trasplante', 'safe', 'on'=>'search'),
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
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'tipo_trasplante_id'),
			'pacientes' => array(self::HAS_MANY, 'Pacientes', 'tipo_trasplante_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tipo_trasplante_id' => 'Id Tipo de Trasplante',
			'tipo_trasplante' => 'Tipo de Trasplante',
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

		$criteria->compare('tipo_trasplante_id',$this->tipo_trasplante_id);
		$criteria->compare('tipo_trasplante',$this->tipo_trasplante,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tipos_trasplantes the static model class
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
