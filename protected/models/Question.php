<?php

/**
 * This is the model class for table "{{question}}".
 *
 * The followings are the available columns in table '{{question}}':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $created
 * @property string $img image name
 * @property integer $id_category
 * @property integer $id_brand
 * @property integer $id_user
 * @property integer $id_city
 * @property integer $question_for_id_user
 * @property integer $admin_check
 */
class Question extends CActiveRecord
{
    public $titleCategory;
    public $titleBrand;
    public $titleCity;
    public $loginRecipient;
    public $loginOwner;
    public $view_count;
    public $image;
    public $dop_inf = array();
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{question}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text, created, id_user', 'required'),
			array('created, id_category, id_brand, id_user, id_city, question_for_id_user, admin_check, view_count', 'numerical', 'integerOnly'=>true),
			array('title, titleCategory, titleBrand, titleCity', 'length', 'max'=>255),
			array('img, loginOwner, loginRecipient', 'length', 'max'=>40),
            array('image', 'file',
                'types'=>'jpg, gif, png',
                'maxSize'=>1024 * 1024 * 5, // 5 MB
                'allowEmpty'=>'true',
                'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
            ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text, created, img, id_category, id_brand, id_user, id_city, question_for_id_user, admin_check, titleCategory, titleBrand, titleCity, loginOwner, loginRecipient, view_count', 'safe', 'on'=>'search'),
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
            'owner' => array(self::BELONGS_TO, 'User', 'id_user'),
            'brand' => array(self::BELONGS_TO, 'Brand', 'id_brand'),
            'city' => array(self::BELONGS_TO, 'City', 'id_city'),
            'user' => array(self::BELONGS_TO, 'User', 'question_for_id_user'),
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
			'id' => 'ID вопроса',
			'title' => 'Заголовок',
			'text' => 'Текст',
			'created' => 'Время создания',
			'img' => 'Картинка',
			'id_category' => 'ID категории',
			'id_brand' => 'ID бренда',
			'id_user' => 'ID пользователя',
			'id_city' => 'ID города',
			'question_for_id_user' => 'ID пользователя которому адресован вопрос',
			'admin_check' => 'Проверку прошел',
            'titleCategory' => 'Название категории',
            'titleBrand' => 'Название бренда',
            'titleCity' => 'Город',
            'loginOwner' => 'Логин пользователя',
            'loginRecipient' => 'Кому адресован вопрос',
            'image' => 'Картинка к статье',
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
        $view_count_sql = "(select count(*) from $view_table pt where pt.id_object = t.id AND pt.type_object = " .VIEWS::TYPE_QUESTION. ')';

        $criteria->with = array('category', 'brand', 'user', 'city', 'viewCount');
        $criteria->select = array('*', $view_count_sql . ' AS view_count');

        $criteria->condition = 'type_object = ' .VIEWS::TYPE_QUESTION. ' OR type_object IS NULL';
        $criteria->group= 't.id';

        $criteria->together = true;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('t.text',$this->text,true);
		$criteria->compare('t.created',$this->created);
		$criteria->compare('t.img',$this->img,true);
		$criteria->compare('t.id_category',$this->id_category);
		$criteria->compare('t.id_brand',$this->id_brand);
		$criteria->compare('t.id_user',$this->id_user);
		$criteria->compare('t.id_city',$this->id_city);
		$criteria->compare('t.question_for_id_user',$this->question_for_id_user);
		$criteria->compare('t.admin_check',$this->admin_check);
        $criteria->compare('category.title',$this->titleCategory,true);
        $criteria->compare('brand.title',$this->titleBrand,true);
        $criteria->compare('city.title',$this->titleCity,true);
        $criteria->compare('owner.login',$this->loginOwner,true);
        $criteria->compare('user.login',$this->loginRecipient,true);
        $criteria->compare($view_count_sql,$this->view_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Prevent question.
     */

    public function prevent() {
        return (self::saveAttributes(array('admin_check'=>1)))?true:false;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
