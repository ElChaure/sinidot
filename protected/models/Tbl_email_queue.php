<?php

/**
 * This is the model class for table "tbl_email_queue".
 *
 * The followings are the available columns in table 'tbl_email_queue':
 * @property integer $id
 * @property string $from_name
 * @property string $from_email
 * @property string $to_email
 * @property string $subject
 * @property string $message
 * @property integer $max_attempts
 * @property integer $attempts
 * @property integer $success
 * @property string $date_published
 * @property string $last_attempt
 * @property string $date_sent
 */
class Tbl_email_queue extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_email_queue';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from_email, to_email, subject, max_attempts, attempts, success', 'required'),
			array('max_attempts, attempts, success', 'numerical', 'integerOnly'=>true),
			array('from_name', 'length', 'max'=>64),
			array('from_email, to_email', 'length', 'max'=>128),
			array('subject', 'length', 'max'=>255),
			array('message, date_published, last_attempt, date_sent', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, from_name, from_email, to_email, subject, message, max_attempts, attempts, success, date_published, last_attempt, date_sent', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'from_name' => 'From Name',
			'from_email' => 'From Email',
			'to_email' => 'To Email',
			'subject' => 'Subject',
			'message' => 'Message',
			'max_attempts' => 'Max Attempts',
			'attempts' => 'Attempts',
			'success' => 'Success',
			'date_published' => 'Date Published',
			'last_attempt' => 'Last Attempt',
			'date_sent' => 'Date Sent',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('from_name',$this->from_name,true);
		$criteria->compare('from_email',$this->from_email,true);
		$criteria->compare('to_email',$this->to_email,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('max_attempts',$this->max_attempts);
		$criteria->compare('attempts',$this->attempts);
		$criteria->compare('success',$this->success);
		$criteria->compare('date_published',$this->date_published,true);
		$criteria->compare('last_attempt',$this->last_attempt,true);
		$criteria->compare('date_sent',$this->date_sent,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tbl_email_queue the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
