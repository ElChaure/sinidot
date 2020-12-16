<?php

/**
 * This is the model class for table "donantes".
 *
 * The followings are the available columns in table 'donantes':
 * @property integer $donante_id
 * @property string $cedula
 * @property string $apellido1
 * @property string $apellido2
 * @property string $nombre1
 * @property string $nombre2
 * @property string $fecha_nacimiento
 * @property string $causa_muerte
 * @property string $fecha_muerte
 * @property integer $tipo_donante_id
 * @property integer $centro_id
 * @property string $nacionalidad
 * @property string $peso
 * @property string $talla
 * @property string $genero
 * @property string $diagnostico
 * @property string $antecedentes_personales_patologicos
 * @property string $antecedentes_epidemiologicos
 * @property string $examen_fisico
 * @property string $hemodinamia
 * @property string $diuresis
 * @property string $proceso_infeccioso
 * @property string $tratamiento_antibiotico
 * @property integer $sangre_id
 * @property string $perfil_renal
 * @property string $perfil_hepatico
 * @property string $hematies
 * @property string $hemoglobina
 * @property string $hematocrito
 * @property string $vcm
 * @property string $hcm
 * @property string $chcm
 * @property string $leucocitos
 * @property string $plaquetas
 * @property string $cultivos
 * @property string $serologia
 * @property string $drogas_vasoactivas
 * @property integer $estatus_id
 *
 * The followings are the available model relations:
 * @property CentrosHospitalarios $centro
 * @property TiposDonantes $tipoDonante
 * @property SueroDonante $sueroDonante
 */
class Donantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'donantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_donante_id, centro_id, sangre_id, estatus_id', 'numerical', 'integerOnly'=>true),
			array('cedula, apellido1, apellido2, nombre1, nombre2, causa_muerte', 'length', 'max'=>20),
			array('nacionalidad, genero', 'length', 'max'=>1),
			array('peso, talla, hematies, hemoglobina, hematocrito, vcm, hcm, chcm, leucocitos', 'length', 'max'=>7),
			array('plaquetas', 'length', 'max'=>6),
            array('cedula', 'unique'),
			array('fecha_nacimiento, fecha_muerte, diagnostico, antecedentes_personales_patologicos, antecedentes_epidemiologicos, examen_fisico, hemodinamia, diuresis, proceso_infeccioso, tratamiento_antibiotico, perfil_renal, perfil_hepatico, cultivos, serologia, drogas_vasoactivas,estatus_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('donante_id, cedula, apellido1, apellido2, nombre1, nombre2, fecha_nacimiento, causa_muerte, fecha_muerte, tipo_donante_id, centro_id, nacionalidad, peso, talla, genero, diagnostico, antecedentes_personales_patologicos, antecedentes_epidemiologicos, examen_fisico, hemodinamia, diuresis, proceso_infeccioso, tratamiento_antibiotico, sangre_id, perfil_renal, perfil_hepatico, hematies, hemoglobina, hematocrito, vcm, hcm, chcm, leucocitos, plaquetas, cultivos, serologia, drogas_vasoactivas, estatus_id', 'safe', 'on'=>'search'),
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
			'centro' => array(self::BELONGS_TO, 'Centros_hospitalarios', 'centro_id'),
			'tipo_donante' => array(self::BELONGS_TO, 'Tipos_donantes', 'tipo_donante_id'),
            'sangre' => array(self::BELONGS_TO, 'Sangre', 'sangre_id'),
			'sueroDonante' => array(self::HAS_ONE, 'Suero_donante', 'donante_id'),
			'nac' => array(self::BELONGS_TO, 'Nacionalidad', 'nacionalidad'),
			'gen' => array(self::BELONGS_TO, 'Generos', 'genero'),
                        'est' => array(self::BELONGS_TO, 'Estatus_don', 'estatus_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'donante_id' => 'Id Donante',
			'cedula' => 'Cedula',
			'apellido1' => '1er Apellido',
			'apellido2' => '2do Apellido',
			'nombre1' => '1er Nombre',
			'nombre2' => '2do Nombre',
			'fecha_nacimiento' => 'Fecha de Nacimiento',
			'causa_muerte' => 'Causa de Muerte',
			'fecha_muerte' => 'Fecha de Muerte',
			'tipo_donante_id' => 'Tipo de Donante',
			'centro_id' => 'Centro Generador',
			'nacionalidad' => 'Nacionalidad',
			'peso' => 'Peso',
			'talla' => 'Talla',
			'genero' => 'Genero',
			'diagnostico' => 'Diagnostico',
			'antecedentes_personales_patologicos' => 'Antecedentes Personales Patologicos',
			'antecedentes_epidemiologicos' => 'Antecedentes Epidemiologicos',
			'examen_fisico' => 'Examen Fisico',
			'hemodinamia' => 'Hemodinamia',
			'diuresis' => 'Diuresis',
			'proceso_infeccioso' => 'Proceso Infeccioso',
			'tratamiento_antibiotico' => 'Tratamiento Antibiotico',
			'sangre_id' => 'Grupo Sanguineo',
			'perfil_renal' => 'Perfil Renal',
			'perfil_hepatico' => 'Perfil Hepatico',
			'hematies' => 'Hematies',
			'hemoglobina' => 'Hemoglobina',
			'hematocrito' => 'Hematocrito',
			'vcm' => 'VCM (Volumen Corpuscular Medio)',
			'hcm' => 'HCM (Hemoglobina Corpuscular Media)',
			'chcm' => 'CHCM (Concentración de Hemoglobina Corpuscular Media)',
			'leucocitos' => 'Leucocitos',
			'plaquetas' => 'Plaquetas',
			'cultivos' => 'Cultivos',
			'serologia' => 'Serologia',
			'drogas_vasoactivas' => 'Drogas Vasoactivas',
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

		$criteria->compare('donante_id',$this->donante_id);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('apellido1',$this->apellido1,true);
		$criteria->compare('apellido2',$this->apellido2,true);
		$criteria->compare('nombre1',$this->nombre1,true);
		$criteria->compare('nombre2',$this->nombre2,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('causa_muerte',$this->causa_muerte,true);
		$criteria->compare('fecha_muerte',$this->fecha_muerte,true);
		$criteria->compare('tipo_donante_id',$this->tipo_donante_id);
		$criteria->compare('centro_id',$this->centro_id);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('talla',$this->talla,true);
		$criteria->compare('genero',$this->genero,true);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('antecedentes_personales_patologicos',$this->antecedentes_personales_patologicos,true);
		$criteria->compare('antecedentes_epidemiologicos',$this->antecedentes_epidemiologicos,true);
		$criteria->compare('examen_fisico',$this->examen_fisico,true);
		$criteria->compare('hemodinamia',$this->hemodinamia,true);
		$criteria->compare('diuresis',$this->diuresis,true);
		$criteria->compare('proceso_infeccioso',$this->proceso_infeccioso,true);
		$criteria->compare('tratamiento_antibiotico',$this->tratamiento_antibiotico,true);
		$criteria->compare('sangre_id',$this->sangre_id);
		$criteria->compare('perfil_renal',$this->perfil_renal,true);
		$criteria->compare('perfil_hepatico',$this->perfil_hepatico,true);
		$criteria->compare('hematies',$this->hematies,true);
		$criteria->compare('hemoglobina',$this->hemoglobina,true);
		$criteria->compare('hematocrito',$this->hematocrito,true);
		$criteria->compare('vcm',$this->vcm,true);
		$criteria->compare('hcm',$this->hcm,true);
		$criteria->compare('chcm',$this->chcm,true);
		$criteria->compare('leucocitos',$this->leucocitos,true);
		$criteria->compare('plaquetas',$this->plaquetas,true);
		$criteria->compare('cultivos',$this->cultivos,true);
		$criteria->compare('serologia',$this->serologia,true);
		$criteria->compare('drogas_vasoactivas',$this->drogas_vasoactivas,true);
		$criteria->compare('estatus_id',$this->estatus_id,false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Donantes the static model class
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

        $this->fecha_nacimiento= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_nacimiento);
        $this->fecha_muerte= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_muerte);
    parent::beforeSave();

    return true;
    }
    else return false;
    }


    public function afterFind()
    {
    $this->fecha_nacimiento= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_nacimiento);
    $this->fecha_muerte= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_muerte);
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
