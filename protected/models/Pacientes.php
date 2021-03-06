<?php

/**
 * This is the model class for table "pacientes".
 *
 * The followings are the available columns in table 'pacientes':
 * @property integer $paciente_id
 * @property integer $tipo_trasplante_id
 * @property string $cedula
 * @property string $nacionalidad
 * @property string $apellido1
 * @property string $apellido2
 * @property string $nombre1
 * @property string $nombre2
 * @property string $fecha_nac
 * @property string $peso
 * @property string $talla
 * @property string $sangre_id
 * @property integer $centro_id
 * @property string $fecha_ini_prog
 * @property string $fecha_ini_dial
 * @property integer $dialisis_id
 * @property string $parametros_dialisis
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $correo_electronico
 * @property integer $region_id
 * @property integer $estado_id
 * @property integer $municipio_id
 * @property integer $parroquia_id
 * @property string $persona_contacto
 * @property string $telefono_contacto
 * @property string $porcentaje_par
 * @property string $fecha__act_par
 * @property string $enfermedad_actual
 * @property string $antecedentes_pers
 * @property string $accesos_vasculares
 * @property string $genero
 * @property integer $condicion_id
 * @property integer $estatus_id
 * @property string $puntaje
 *

 * The followings are the available model relations:
 * @property HlaPaciente $hlaPaciente
 * @property Examenes[] $examenes
 * @property SueroPaciente[] $sueroPacientes
 * @property CentrosHospitalarios $centro
 * @property CondicionPaciente $condicion
 * @property EstatusPac $estatus
 * @property TiposTrasplantes $tipoTrasplante
 */
class Pacientes extends CActiveRecord
{
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pacientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_trasplante_id,cedula, apellido1, nombre1, fecha_nac, peso, talla, centro_id, direccion, telefono, celular, correo_electronico, region_id, estado_id, municipio_id, parroquia_id, genero,fecha_ini_prog,fecha_ini_dial,fecha__act_par', 'required'),
			array('tipo_trasplante_id, centro_id, dialisis_id, region_id, estado_id, municipio_id, parroquia_id, condicion_id, estatus_id', 'numerical', 'integerOnly'=>true),
			array('cedula, sangre_id, telefono, celular, telefono_contacto', 'length', 'max'=>20),
			array('nacionalidad, genero', 'length', 'max'=>1),
			array('apellido1, apellido2, nombre1, nombre2', 'length', 'max'=>30),
			array('peso', 'length', 'max'=>7),
			array('talla', 'length', 'max'=>5),
			array('correo_electronico, persona_contacto', 'length', 'max'=>50),
			array('correo_electronico','email'),
			array('fecha_ini_prog, fecha_ini_dial, parametros_dialisis, porcentaje_par, fecha__act_par, enfermedad_actual, antecedentes_pers, accesos_vasculares', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('paciente_id, tipo_trasplante_id, cedula, nacionalidad, apellido1, apellido2, nombre1, nombre2, fecha_nac, peso, talla, sangre_id, centro_id, fecha_ini_prog, fecha_ini_dial, dialisis_id, parametros_dialisis, direccion, telefono, celular, correo_electronico, region_id, estado_id, municipio_id, parroquia_id, persona_contacto, telefono_contacto, porcentaje_par, fecha__act_par, enfermedad_actual, antecedentes_pers, accesos_vasculares, genero, condicion_id, estatus_id', 'safe', 'on'=>'search'),
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
			'tipoTrasplante' => array(self::BELONGS_TO, 'Tipos_trasplantes', 'tipo_trasplante_id'),
			'condicion' => array(self::BELONGS_TO, 'Condicion_paciente', 'condicion_id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus_pac', 'estatus_id'),
			'sueroPacientes' => array(self::HAS_MANY, 'Suero_paciente', 'paciente_id'),
			'examenes' => array(self::HAS_MANY, 'Examenes', 'paciente_id'),
			'hlaPaciente' => array(self::HAS_ONE, 'Hla_paciente', 'paciente_id'),
			'sangre' => array(self::BELONGS_TO, 'Sangre', 'sangre_id'),
			'est' => array(self::BELONGS_TO, 'Estados', 'estado_id'),
			'mun' => array(self::BELONGS_TO, 'Municipios', 'municipio_id'),
			'par' => array(self::BELONGS_TO, 'Parroquias', 'parroquia_id'),
			'reg' => array(self::BELONGS_TO, 'Regiones', 'region_id'),
			'dial' => array(self::BELONGS_TO, 'Tipos_dialisis', 'dialisis_id'),
			'nac' => array(self::BELONGS_TO, 'Nacionalidad', 'nacionalidad'),
			'gen' => array(self::BELONGS_TO, 'Generos', 'genero'),
                        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'paciente_id' => 'Id',
			'tipo_trasplante_id' => 'Tipo Trasplante',
			'cedula' => 'Cedula',
			'nacionalidad' => 'Nacionalidad',
			'apellido1' => '1er Apellido',
			'apellido2' => '2do Apellido',
			'nombre1' => '1er Nombre',
			'nombre2' => '2do Nombre',
			'fecha_nac' => 'Fecha Nacimiento',
			'peso' => 'Peso',
			'talla' => 'Talla',
			'sangre_id' => 'Grupo ABO',
			'centro_id' => 'Centro Control',
			'fecha_ini_prog' => 'Fecha Inicio en el Programa',
			'fecha_ini_dial' => 'Fecha Inicio de Dialisis',
			'dialisis_id' => 'Tipo de Dialisis',
			'parametros_dialisis' => 'Parametros Dialisis',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'correo_electronico' => 'Correo Electronico',
			'region_id' => 'Region',
			'estado_id' => 'Estado',
			'municipio_id' => 'Municipio',
			'parroquia_id' => 'Parroquia',
			'persona_contacto' => 'Persona Contacto',
			'telefono_contacto' => 'Telefono Contacto',
			'porcentaje_par' => 'Porcentaje PAR',
			'fecha__act_par' => 'Fecha Actualizacion % PAR',
			'enfermedad_actual' => 'Enfermedad Actual',
			'antecedentes_pers' => 'Antecedentes Personales',
			'accesos_vasculares' => 'Resumen de Accesos Vasculares',
			'genero' => 'Genero',
			'condicion_id' => 'Condicion',
			'estatus_id' => 'Estatus',
			'puntaje'=>'Puntaje',
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
		$criteria->compare('tipo_trasplante_id',$this->tipo_trasplante_id);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('apellido1',$this->apellido1,true);
		$criteria->compare('apellido2',$this->apellido2,true);
		$criteria->compare('nombre1',$this->nombre1,true);
		$criteria->compare('nombre2',$this->nombre2,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('talla',$this->talla,true);
		$criteria->compare('sangre_id',$this->sangre_id,true);
		$criteria->compare('centro_id',$this->centro_id);
		$criteria->compare('fecha_ini_prog',$this->fecha_ini_prog,true);
		$criteria->compare('fecha_ini_dial',$this->fecha_ini_dial,true);
		$criteria->compare('dialisis_id',$this->dialisis_id);
		$criteria->compare('parametros_dialisis',$this->parametros_dialisis,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('correo_electronico',$this->correo_electronico,true);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('estado_id',$this->estado_id);
		$criteria->compare('municipio_id',$this->municipio_id);
		$criteria->compare('parroquia_id',$this->parroquia_id);
		$criteria->compare('persona_contacto',$this->persona_contacto,true);
		$criteria->compare('telefono_contacto',$this->telefono_contacto,true);
		$criteria->compare('porcentaje_par',$this->porcentaje_par,true);
		$criteria->compare('fecha__act_par',$this->fecha__act_par,true);
		$criteria->compare('enfermedad_actual',$this->enfermedad_actual,true);
		$criteria->compare('antecedentes_pers',$this->antecedentes_pers,true);
		$criteria->compare('accesos_vasculares',$this->accesos_vasculares,true);
		$criteria->compare('genero',$this->genero,true);
		$criteria->compare('condicion_id',$this->condicion_id);
		$criteria->compare('estatus_id',$this->estatus_id);
		$criteria->compare('puntaje',$this->puntaje);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                'defaultOrder' => 'paciente_id ASC', 
            ),
		));
	}
	
	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pacientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
    public function getColor() {
        
        $statuscolor='white';
        switch ($this->estatus_id) {
            case 1:
                $statuscolor='blue';
                break;
            case 2:
                $statuscolor='white';
                break;
            case 3:
                $statuscolor='green';
                break;
            case 4:
                $statuscolor='yellow';
                break;       
			case 5:
                $statuscolor='red';
                break;       	
        }
		
        return $statuscolor;
        
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


    $this->fecha_nac= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_nac);
    $this->fecha_ini_prog= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_ini_prog);
    $this->fecha_ini_dial= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha_ini_dial);
    $this->fecha__act_par= Yii::app()->dateformatter->format("yyyy-MM-dd",$this->fecha__act_par);	
    parent::beforeSave();

    return true;
    }
    else return false;
    }


    public function afterFind()
    {
    $this->fecha_nac= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_nac);
    $this->fecha_ini_prog= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_ini_prog);
    $this->fecha_ini_dial= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha_ini_dial);
    $this->fecha__act_par= Yii::app()->dateformatter->format("dd-MM-yyyy",$this->fecha__act_par);
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
