<?php

/**
 * This is the model class for table "datos_personas_e".
 *
 * The followings are the available columns in table 'datos_personas_e':
 * @property string $LETRA
 * @property integer $NUMCEDULA
 * @property string $PAISORIGEN
 * @property string $NACIONALIDAD
 * @property string $PRIMERNOMBRE
 * @property string $SEGUNDONOMBRE
 * @property string $PRIMERAPELLIDO
 * @property string $SEGUNDOAPELLIDO
 * @property string $FECHANAC
 * @property string $FECHACEDORG
 * @property string $CODOBJECION
 * @property string $CODOFICINA
 * @property string $CODESTADOCIVIL
 * @property string $NATURALIZADO
 * @property string $SEXO
 */
class Datos_personas_e extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datos_personas_e';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NUMCEDULA', 'required'),
			array('NUMCEDULA', 'numerical', 'integerOnly'=>true),
			array('LETRA, PAISORIGEN, NACIONALIDAD, PRIMERNOMBRE, SEGUNDONOMBRE, PRIMERAPELLIDO, SEGUNDOAPELLIDO, FECHANAC, FECHACEDORG, CODOBJECION, CODOFICINA, CODESTADOCIVIL, NATURALIZADO, SEXO', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LETRA, NUMCEDULA, PAISORIGEN, NACIONALIDAD, PRIMERNOMBRE, SEGUNDONOMBRE, PRIMERAPELLIDO, SEGUNDOAPELLIDO, FECHANAC, FECHACEDORG, CODOBJECION, CODOFICINA, CODESTADOCIVIL, NATURALIZADO, SEXO', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LETRA' => 'Letra',
			'NUMCEDULA' => 'Numcedula',
			'PAISORIGEN' => 'Paisorigen',
			'NACIONALIDAD' => 'Nacionalidad',
			'PRIMERNOMBRE' => 'Primernombre',
			'SEGUNDONOMBRE' => 'Segundonombre',
			'PRIMERAPELLIDO' => 'Primerapellido',
			'SEGUNDOAPELLIDO' => 'Segundoapellido',
			'FECHANAC' => 'Fechanac',
			'FECHACEDORG' => 'Fechacedorg',
			'CODOBJECION' => 'Codobjecion',
			'CODOFICINA' => 'Codoficina',
			'CODESTADOCIVIL' => 'Codestadocivil',
			'NATURALIZADO' => 'Naturalizado',
			'SEXO' => 'Sexo',
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

		$criteria->compare('LETRA',$this->LETRA,true);
		$criteria->compare('NUMCEDULA',$this->NUMCEDULA);
		$criteria->compare('PAISORIGEN',$this->PAISORIGEN,true);
		$criteria->compare('NACIONALIDAD',$this->NACIONALIDAD,true);
		$criteria->compare('PRIMERNOMBRE',$this->PRIMERNOMBRE,true);
		$criteria->compare('SEGUNDONOMBRE',$this->SEGUNDONOMBRE,true);
		$criteria->compare('PRIMERAPELLIDO',$this->PRIMERAPELLIDO,true);
		$criteria->compare('SEGUNDOAPELLIDO',$this->SEGUNDOAPELLIDO,true);
		$criteria->compare('FECHANAC',$this->FECHANAC,true);
		$criteria->compare('FECHACEDORG',$this->FECHACEDORG,true);
		$criteria->compare('CODOBJECION',$this->CODOBJECION,true);
		$criteria->compare('CODOFICINA',$this->CODOFICINA,true);
		$criteria->compare('CODESTADOCIVIL',$this->CODESTADOCIVIL,true);
		$criteria->compare('NATURALIZADO',$this->NATURALIZADO,true);
		$criteria->compare('SEXO',$this->SEXO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db2;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Datos_personas_e the static model class
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
