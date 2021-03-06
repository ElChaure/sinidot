<?php

/**
 * This is the model class for table "centros_hospitalarios".
 *
 * The followings are the available columns in table 'centros_hospitalarios':
 * @property integer $centro_id
 * @property integer $cedula
 * @property string $nombre
 * @property integer $tipo_centro_id
 * @property string $direccion
 * @property integer $estado_id
 * @property integer $municipio_id
 * @property integer $parroquia_id
 * @property integer $region_id
 * @property integer $ctx_id
 *
 * The followings are the available model relations:
 * @property Pacientes[] $pacientes
 * @property Usuarios[] $usuarioses
 * @property Personal[] $personals
 * @property Estados $estado
 * @property Municipios $municipio
 * @property Parroquias $parroquia
 * @property Regiones $region
 * @property TiposCentros $tipoCentro
 * @property Donantes[] $donantes
 */
class Centros_hospitalarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'centros_hospitalarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre,cedula ,tipo_centro_id, estado_id, municipio_id, parroquia_id, region_id, ctx_id', 'required'),
			array('cedula, tipo_centro_id, estado_id, municipio_id, parroquia_id, region_id, ctx_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>80),
			array('direccion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('centro_id, cedula, nombre, tipo_centro_id, direccion, estado_id, municipio_id, parroquia_id, region_id, ctx_id', 'safe', 'on'=>'search'),
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
			'pacientes' => array(self::HAS_MANY, 'Pacientes', 'centro_id'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'centro_id'),
			'personals' => array(self::MANY_MANY, 'Personal', 'personal_centro_hospitalario(centro_id, personal_id)'),
			'estado' => array(self::BELONGS_TO, 'Estados', 'estado_id'),
			'municipio' => array(self::BELONGS_TO, 'Municipios', 'municipio_id'),
			'parroquia' => array(self::BELONGS_TO, 'Parroquias', 'parroquia_id'),
			'region' => array(self::BELONGS_TO, 'Regiones', 'region_id'),
			'tipoCentro' => array(self::BELONGS_TO, 'Tipos_centros', 'tipo_centro_id'),
			'donantes' => array(self::HAS_MANY, 'Donantes', 'centro_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'centro_id' => 'Id Centro',
			'cedula' => 'Nro Cedula Hospitalaria',
			'nombre' => 'Nombre',
			'tipo_centro_id' => 'Tipo Centro',
			'direccion' => 'Direccion',
			'estado_id' => 'Estado',
			'municipio_id' => 'Municipio',
			'parroquia_id' => 'Parroquia',
			'region_id' => 'Region',
			'ctx_id' => 'Ctx',
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

		$criteria->compare('centro_id',$this->centro_id);
		$criteria->compare('centro_id',$this->cedula);		
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('tipo_centro_id',$this->tipo_centro_id);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('estado_id',$this->estado_id);
		$criteria->compare('municipio_id',$this->municipio_id);
		$criteria->compare('parroquia_id',$this->parroquia_id);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('ctx_id',$this->ctx_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Centros_hospitalarios the static model class
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
