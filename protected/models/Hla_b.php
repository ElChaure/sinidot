<?php

/**
 * This is the model class for table "hla_b".
 *
 * The followings are the available columns in table 'hla_b':
 * @property integer $locus_b_id
 * @property string $locus_b_alelo_1
 */
class Hla_b extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hla_b';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('locus_b_alelo_1', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('locus_b_id, locus_b_alelo_1', 'safe', 'on'=>'search'),
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
			'locus_b_id' => 'Id Antigeno B',
			'locus_b_alelo_1' => 'Antigeno B',
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

		$criteria->compare('locus_b_id',$this->locus_b_id);
		$criteria->compare('locus_b_alelo_1',$this->locus_b_alelo_1,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hla_b the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function buscaAlelo($pk,$tab,$ret)
        {
            if ($pk != '')
            {
			   $tabla = $tab::model()->findByPk($pk);
			   $alelo= $tabla->$ret;
			}
			else
			{
			 $alelo="";
			}
            return $alelo;
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
