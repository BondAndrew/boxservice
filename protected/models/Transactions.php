<?php

/**
 * This is the model class for table "{{transactions}}".
 *
 * The followings are the available columns in table '{{transactions}}':
 * @property integer $id
 * @property integer $id_user
 * @property integer $time
 * @property string $payment_system
 * @property string $hash
 * @property integer $payment_success
 * @property integer $payment_problem
 */
class Transactions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{transactions}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, time, payment_system, hash', 'required'),
			array('id_user, time, payment_success, payment_problem', 'numerical', 'integerOnly'=>true),
			array('payment_system', 'length', 'max'=>20),
			array('hash', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, time, payment_system, hash, payment_success, payment_problem', 'safe', 'on'=>'search'),
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
			'id_user' => 'Id User',
			'time' => 'Time',
			'payment_system' => 'Payment System',
			'hash' => 'Hash',
			'payment_success' => 'Payment Success',
			'payment_problem' => 'Payment Problem',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('time',$this->time);
		$criteria->compare('payment_system',$this->payment_system,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('payment_success',$this->payment_success);
		$criteria->compare('payment_problem',$this->payment_problem);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transactions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
