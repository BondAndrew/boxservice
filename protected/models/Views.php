<?php

/**
 * This is the model class for table "{{views}}".
 *
 * The followings are the available columns in table '{{views}}':
 * @property integer $id
 * @property string $user_ip
 * @property integer $time_viewing
 * @property integer $id_object
 * @property string $type_object
 */
class Views extends CActiveRecord
{

    const TYPE_NEWS = 1;
    const TYPE_QUESTION = 2;
    const TYPE_REQUEST = 3;
    const TYPE_PROFILE = 4;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{views}}';
	}

    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_ip, time_viewing, id_object, type_object', 'required'),
			array('time_viewing, id_object', 'numerical', 'integerOnly'=>true),
			array('user_ip, type_object', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_ip, time_viewing, id_object, type_object', 'safe', 'on'=>'search'),
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
			'user_ip' => 'User Ip',
			'time_viewing' => 'Time Viewing',
			'id_object' => 'Id Object',
			'type_object' => 'Type Object',
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
		$criteria->compare('user_ip',$this->user_ip,true);
		$criteria->compare('time_viewing',$this->time_viewing);
		$criteria->compare('id_object',$this->id_object);
		$criteria->compare('type_object',$this->type_object,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Views the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
