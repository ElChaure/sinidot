<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $usuario_id
 * @property string $usuario
 * @property string $clave
 * @property string $nombre
 * @property integer $centro_id
 * @property integer $rol_id
 * @property integer $estatus_id
 * @property integer $tipo_trasplante_id
 *
 * The followings are the available model relations:
 * @property TiposTrasplantes $tipoTrasplante
 * @property CentrosHospitalarios $centro
 * @property EstatusUsr $estatus
 * @property Roles $rol
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, clave, nombre, centro_id, rol_id, estatus_id, tipo_trasplante_id', 'required'),
			array('centro_id, rol_id, estatus_id, tipo_trasplante_id', 'numerical', 'integerOnly'=>true),
			array('usuario, clave', 'length', 'max'=>30),
			array('nombre', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_id, usuario, clave, nombre, centro_id, rol_id, estatus_id, tipo_trasplante_id', 'safe', 'on'=>'search'),
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
			'tipoTrasplante' => array(self::BELONGS_TO, 'TiposTrasplantes', 'tipo_trasplante_id'),
			'centro' => array(self::BELONGS_TO, 'CentrosHospitalarios', 'centro_id'),
			'estatus' => array(self::BELONGS_TO, 'EstatusUsr', 'estatus_id'),
			'rol' => array(self::BELONGS_TO, 'Roles', 'rol_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuario_id' => 'Usuario',
			'usuario' => 'Usuario',
			'clave' => 'Clave',
			'nombre' => 'Nombre',
			'centro_id' => 'Centro',
			'rol_id' => 'Rol',
			'estatus_id' => 'Estatus',
			'tipo_trasplante_id' => 'Tipo Trasplante',
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

		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('centro_id',$this->centro_id);
		$criteria->compare('rol_id',$this->rol_id);
		$criteria->compare('estatus_id',$this->estatus_id);
		$criteria->compare('tipo_trasplante_id',$this->tipo_trasplante_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
