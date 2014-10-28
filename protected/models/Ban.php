<?php

/**
 * This is the model class for table "{{ban}}".
 *
 * The followings are the available columns in table '{{ban}}':
 * @property integer $id_user
 * @property integer $finishing
 * @property string $description
 */
class Ban extends CActiveRecord
{
    public $login;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ban}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, description', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>255),
            array('login', 'length', 'max'=>32),
            array('finishing', 'safe'),
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, finishing, description, login', 'safe', 'on'=>'search'),
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
            'user' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'ID пользователя',
			'finishing' => 'Дата окончания бана',
			'description' => 'Причина бана',
			'login' => 'Логин пользователя',
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

        $criteria->with = array(
            'user'=>array(
                'select' => array('login'),
            )
        );

        $criteria->together = true;

		$criteria->compare('login',$this->login,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('finishing',$this->finishing);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id_user DESC',
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ban the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
