<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $username
 * @property integer $send_notification
 * @property string $email
 * @property integer $type
 * @property string $img
 * @property integer $check_user
 * @property integer $time_registration
 */
class User extends CActiveRecord
{
    public $ban;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password, username, send_notification, email, time_registration', 'required'),
			array('send_notification, type, check_user, time_registration', 'numerical', 'integerOnly'=>true),
			array('login, password, email', 'length', 'max'=>32),
			array('username', 'length', 'max'=>64),
			array('img', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, password, username, send_notification, email, type, img, check_user, time_registration', 'safe', 'on'=>'search'),
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
            'ban' => array(self::BELONGS_TO, 'Ban', 'id_user')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
			'username' => 'Username',
			'send_notification' => 'Send Notification',
			'email' => 'Email',
			'type' => 'Type',
			'img' => 'Img',
			'check_user' => 'Check User',
			'time_registration' => 'Time Registration',
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
            'ban'=>array(
                'select' => array('ban.finishing'),
            ),
        );

        $criteria->together = true;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('send_notification',$this->send_notification);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('check_user',$this->check_user);
		$criteria->compare('time_registration',$this->time_registration);
		$criteria->compare('finishing',$this->ban);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * get array with all brand
     * where id it is a key, title it is a value
     * @param int $type where 0 - all users, 1 - simple users, 2 - service
     * @return array
     */

    public function getAllUserIdTitle ($type = 0) {
        $params = array();
        $condition = '';
        $type = (int)$type;
        if ($type === 1 || $type === 2) {
            $params = array(':type_user'=>$type);
            $condition = 'type=:type_user';
        }

        $allUsers = self::findAll($condition, $params);
        $returnArray = array();

        if (!empty($allUsers)) {
            foreach ($allUsers as $user) {
                $returnArray[$user['id']] = $user['login'];
            }
        }

        return $returnArray;
    }

    /**
     * Prevent user.
     */

    public function prevent() {
        return (self::saveAttributes(array('check_user'=>1)))?true:false;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
