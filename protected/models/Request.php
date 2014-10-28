<?php

/**
 * This is the model class for table "{{request}}".
 *
 * The followings are the available columns in table '{{request}}':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $created
 * @property integer $id_category
 * @property integer $id_brand
 * @property integer $id_user
 * @property integer $id_city
 * @property integer $time_close_request
 * @property integer $valuations
 * @property integer $assessment_working_time
 * @property integer $admin_check
 */
class Request extends CActiveRecord
{
    public $titleCategory;
    public $titleBrand;
    public $titleCity;
    public $view_count;
    public $login;
    public $dop_inf = array();

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{request}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text, created, time_close_request, id_user, time_close_request', 'required'),
			array('created, id_category, id_brand, id_user, id_city, time_close_request, valuations, assessment_working_time, admin_check, view_count', 'numerical', 'integerOnly'=>true),
            array('title, titleCategory, titleBrand, titleCity', 'length', 'max'=>255),
            array('login', 'length', 'max'=>40),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text, created, id_category, id_brand, id_user, id_city, time_close_requests, valuations, assessment_working_time, admin_check, titleCategory, titleBrand, titleCity, view_count, login', 'safe', 'on'=>'search'),
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
            'category' => array(self::BELONGS_TO, 'Category', 'id_category'),
            'user' => array(self::BELONGS_TO, 'User', 'id_user'),
            'brand' => array(self::BELONGS_TO, 'Brand', 'id_brand'),
            'city' => array(self::BELONGS_TO, 'City', 'id_city'),
            'viewCount' => array(self::HAS_MANY, 'Views', 'id_object'),
            'view' => array(self::STAT, 'Views', 'id_object'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название',
			'text' => 'Текст',
			'created' => 'Время создания',
			'id_category' => 'ID категории',
			'id_brand' => 'ID бренда',
			'id_user' => 'ID владельца',
			'id_city' => 'ID города',
			'time_close_request' => 'Время закрытия заявки',
			'valuations' => 'Необходима оценка стоимости',
			'assessment_working_time' => 'Необходима оценка времени работы',
			'admin_check' => 'Прошла проверку заявка',
            'titleCategory' => 'Название категории',
            'titleBrand' => 'Название бренда',
            'titleCity' => 'Город',
            'login' => 'Логин пользователя',
            'view_count' => 'Количество просмотров',
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
        $view_count_sql = "(select count(*) from $view_table pt where pt.id_object = t.id AND pt.type_object = " .VIEWS::TYPE_REQUEST. ')';

        $criteria->with = array('category', 'brand', 'user', 'city', 'viewCount');
        $criteria->select = array('*', $view_count_sql . ' AS view_count');

        $criteria->condition = 'type_object = ' .VIEWS::TYPE_REQUEST. ' OR type_object IS NULL';
        $criteria->group= 't.id';

        $criteria->together = true;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('t.text',$this->text,true);
		$criteria->compare('t.created',$this->created);
		$criteria->compare('t.id_category',$this->id_category);
		$criteria->compare('t.id_brand',$this->id_brand);
		$criteria->compare('t.id_user',$this->id_user);
		$criteria->compare('t.id_city',$this->id_city);
		$criteria->compare('t.time_close_request',$this->time_close_request);
		$criteria->compare('t.valuations',$this->valuations);
		$criteria->compare('t.assessment_working_time',$this->assessment_working_time);
		$criteria->compare('t.admin_check',$this->admin_check);
        $criteria->compare('category.title',$this->titleCategory,true);
        $criteria->compare('brand.title',$this->titleBrand,true);
        $criteria->compare('city.title',$this->titleCity,true);
        $criteria->compare('user.login',$this->login,true);
        $criteria->compare($view_count_sql,$this->view_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Prevent request.
     */

    public function prevent() {
        return (self::saveAttributes(array('admin_check'=>1)))?true:false;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Request the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
