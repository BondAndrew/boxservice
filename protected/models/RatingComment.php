<?php

/**
 * This is the model class for table "{{rating_comment}}".
 *
 * The followings are the available columns in table '{{rating_comment}}':
 * @property integer $id
 * @property string $user_ip
 * @property integer $created
 * @property integer $id_comment
 * @property integer $id_owner_object
 */
class RatingComment extends CActiveRecord
{

    public $loginOwnerObject;
    public $textComment;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{rating_comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_ip, created, id_comment, id_owner_object, loginOwnerObject, textComment', 'required'),
			array('created, id_comment, id_owner_object', 'numerical', 'integerOnly'=>true),
			array('user_ip', 'length', 'max'=>30),
			array('loginOwnerObject, textComment', 'length', 'max'=>30),
			array('user_ip', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_ip, created, id_comment, id_owner_object', 'safe', 'on'=>'search'),
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
            'user' => array(self::BELONGS_TO, 'User', 'question_for_id_user'),
            'comment' => array(self::BELONGS_TO, 'Comment', 'id_comment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_ip' => 'IP пользователя',
			'created' => 'Дата создания',
			'id_comment' => 'ID комментария',
			'id_owner_object' => 'ID владельца комментария',
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
		$criteria->compare('created',$this->created);
		$criteria->compare('id_comment',$this->id_comment);
		$criteria->compare('id_owner_object',$this->id_owner_object);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RatingComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
