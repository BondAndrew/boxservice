<?php

/**
 * This is the model class for table "{{service_center}}".
 *
 * The followings are the available columns in table '{{service_center}}':
 * @property integer $id_center
 * @property integer $id_user
 * @property string $name
 * @property string $email_officially
 * @property string $telephone
 * @property integer $id_city
 * @property string $street
 * @property string $coordinates
 * @property string $working_hours
 * @property string $dop_info
 * @property string $site
 * @property string $transliteration
 * @property integer $personal_questions
 */
class ServiceCenter extends CActiveRecord
{
    public $title_brand;
    public $title_category;
    public $title_dop_service;
    public $title_city;
    public $count_views;
    public $login;
    public $username;
    public $send_notification;
    public $email;
    public $img;
    public $check_user;
    public $time_registration;
    public $image;
    public $dop_array_title = array();

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{service_center}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, name, email_officially, telephone, coordinates, working_hours, transliteration', 'required'),
			array('id_user, id_city, personal_questions, check_user, time_registration, send_notification', 'numerical', 'integerOnly'=>true),
			array('name, telephone, site, transliteration title_brand, title_category, title_dop_service, title_city', 'length', 'max'=>255),
			array('email_officially, img', 'length', 'max'=>40),
			array('login, email', 'length', 'max'=>32),
            array('username', 'length', 'max'=>64),
			array('street', 'length', 'max'=>511),
			array('working_hours', 'length', 'max'=>1023),
			array('dop_info', 'safe'),
            array('image', 'file',
                'types'=>'jpg, gif, png',
                'maxSize'=>1024 * 1024 * 5, // 5 MB
                'allowEmpty'=>'true',
                'tooLarge'=>'Фото весит больше 5 MB. Пожалуйста, загрузите фото меньшего размера.',
            ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_center, id_user, name, email_officially, telephone, id_city, street, coordinates, working_hours, dop_info, site, transliteration, personal_questions, title_brand, title_category, title_dop_service, title_city, count_views, login, username, send_notification, email, img, check_user, time_registration', 'safe', 'on'=>'search'),
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
            'city' => array(self::BELONGS_TO, 'City', 'id_city'),
            'user' => array(self::BELONGS_TO, 'User', 'id_user'),
            'categoryServiceCenter' => array(self::HAS_MANY, 'CategoryServiceCenter', 'id_center'),
            'category' => array(self::HAS_MANY, 'Category', array('id_category'=>'id'), 'through' => 'categoryServiceCenter'),
            'centerBrand' => array(self::HAS_MANY, 'CenterBrand', 'id_center'),
            'brand' => array(self::HAS_MANY, 'Brand', array('id_brand'=>'id'), 'through' => 'centerBrand'),
            'centerDopService' => array(self::HAS_MANY, 'CenterDopService', 'id_center'),
            'dopService' => array(self::HAS_MANY, 'DopService', array('id_dop_service'=>'id'), 'through' => 'centerDopService'),
            'viewCount' => array(self::HAS_MANY, 'Views', array('id'=>'id_object'), 'through' => 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_center' => 'ID',
			'id_user' => 'ID в таблице пользователя',
			'name' => 'Название сервисного центра',
			'email_officially' => 'Официальная почта',
			'telephone' => 'телефон',
			'id_city' => 'ID города',
			'street' => 'Улица',
			'coordinates' => 'Координаты',
			'working_hours' => 'Рабочие часы',
			'dop_info' => 'Дополнительная информация',
			'site' => 'Сайт',
			'transliteration' => 'Пропись названия латиницей',
			'personal_questions' => 'Разрешено задавать вопросы в личку',
			'title_brand' => 'Название обслуживаемых брендов',
			'title_category' => 'Название обслуживаемых категорий',
			'title_dop_service' => 'Дополнительные услуги',
			'title_city' => 'Город',
			'count_views' => 'Количество просмотров профиля',
            'login' => 'Логин',
            'username' => 'Имя пользователя',
            'send_notification' => 'Разрешено присылать уведомления на почту',
            'email' => 'Почта при регистрации',
            'img' => 'Логотип сервисного центра',
            'check_user' => 'Прошел проверку',
            'time_registration' => 'Время регистрации',
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

        $view_table = Views::model()->tableName();
        $view_count_sql = "(select count(*) from $view_table pt where pt.id_object = t.id_user AND pt.type_object = " .VIEWS::TYPE_PROFILE. ')';

        $criteria->with = array('category', 'brand', 'user', 'city', 'viewCount', 'categoryServiceCenter', 'centerBrand', 'centerDopService', 'dopService');
        $criteria->select = array('*', $view_count_sql . ' AS view_count');

        $criteria->condition = 'type_object = ' .VIEWS::TYPE_PROFILE. ' OR type_object IS NULL';
        $criteria->group= 't.id_user';

        $criteria->together = true;

		$criteria->compare('t.id_center',$this->id_center);
		$criteria->compare('t.id_user',$this->id_user);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.email_officially',$this->email_officially,true);
		$criteria->compare('t.telephone',$this->telephone,true);
		$criteria->compare('t.id_city',$this->id_city);
		$criteria->compare('t.street',$this->street,true);
		$criteria->compare('t.coordinates',$this->coordinates,true);
		$criteria->compare('t.working_hours',$this->working_hours,true);
		$criteria->compare('t.dop_info',$this->dop_info,true);
		$criteria->compare('t.site',$this->site,true);
		$criteria->compare('t.transliteration',$this->transliteration,true);
        $criteria->compare('t.personal_questions',$this->personal_questions);
        $criteria->compare('brand.title',$this->title_brand);
        $criteria->compare('category.title',$this->title_category);
        $criteria->compare('dopService.title',$this->title_dop_service);
        $criteria->compare('city.title',$this->title_city);
		$criteria->compare('login',$this->login);
		$criteria->compare('username',$this->username);
		$criteria->compare('send_notification',$this->send_notification);
		$criteria->compare('email',$this->email);
		$criteria->compare('img',$this->img);
		$criteria->compare('check_user',$this->check_user);
		$criteria->compare('time_registration',$this->time_registration);
        $criteria->compare($view_count_sql,$this->count_views);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServiceCenter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
