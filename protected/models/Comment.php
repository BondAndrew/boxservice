<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $id
 * @property integer $id_user
 * @property integer $created
 * @property integer $id_object
 * @property string $type_object
 * @property string $text
 * @property integer $valuations
 * @property integer $assessment_working_time
 * @property integer $admin_check
 */
class Comment extends CActiveRecord
{
    public $login;
    public $dop_inf;
    public $rating_comment;
    const REQUEST = 'Ответ на заявку';
    const QUESTION = 'Ответ на вопрос';
    const NEWS = 'Комментарий новости';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, created, id_object, type_object, text', 'required'),
            array('id_user, created, id_object, valuations, assessment_working_time, admin_check, rating_comment', 'numerical', 'integerOnly'=>true),
            array('login', 'length', 'max'=>32),
            array('type_object', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('id, id_user, created, id_object, type_object, valuations, assessment_working_time, admin_check, login, rating_comment', 'safe', 'on'=>'search'),
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
            'rating' => array(self::HAS_MANY, 'RatingComment', 'id_comment'),
            'countRating' => array(self::STAT, 'RatingComment', 'id_comment'),
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
            'login' => 'Логин комментатора',
			'created' => 'Время создания',
			'id_object' => 'Номер комментируемого объекта',
			'type_object' => 'Вид комментария',
			'valuations' => 'Оценка стоимости работы',
			'assessment_working_time' => 'Срок выполнения работы',
			'text' => 'Текст комментария',
			'admin_check' => 'Прошел проверку комментарий',
            'rating_comment' => 'Рейтинг комментария',
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

        $view_table = RatingComment::model()->tableName();
        $view_count_sql = "(select count(*) from $view_table pt where pt.id_comment = t.id)";

        $criteria->with = array('user', 'countRating');
        $criteria->select = array('*', $view_count_sql . " as rating_comment");
        $criteria->group= "t.id";

        $criteria->together = true;

        $criteria->compare('login',$this->login,true);
        $criteria->compare('id',$this->id, true);
        $criteria->compare('text',$this->text);
        $criteria->compare('id_user',$this->id_user);
        $criteria->compare('created',$this->created);
        $criteria->compare('id_object',$this->id_object);
        $criteria->compare('type_object',$this->type_object,true);
        $criteria->compare('valuations',$this->valuations);
        $criteria->compare('assessment_working_time',$this->assessment_working_time);
        $criteria->compare('admin_check',$this->admin_check);
        $criteria->compare($view_count_sql,$this->rating_comment);

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Prevent comment.
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
