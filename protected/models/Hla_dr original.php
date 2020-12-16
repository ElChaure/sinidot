<?php

/**
 * This is the model class for table "hla_dr".
 *
 * The followings are the available columns in table 'hla_dr':
 * @property integer $locus_dr_id
 * @property string $locus_dr_alelo_1
 * @property string $locus_dr_alelo_2
 */
class Hla_dr extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hla_dr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('locus_dr_alelo_1, locus_dr_alelo_2', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('locus_dr_id, locus_dr_alelo_1, locus_dr_alelo_2', 'safe', 'on'=>'search'),
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
			'locus_dr_id' => 'Locus DR',
			'locus_dr_alelo_1' => 'Locus DR Alelo 1',
			'locus_dr_alelo_2' => 'Locus DR Alelo 2',
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

		$criteria->compare('locus_dr_id',$this->locus_dr_id);
		$criteria->compare('locus_dr_alelo_1',$this->locus_dr_alelo_1,true);
		$criteria->compare('locus_dr_alelo_2',$this->locus_dr_alelo_2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hla_dr the static model class
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
}
