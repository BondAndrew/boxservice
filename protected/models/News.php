<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $created
 * @property string $img
 * @property integer $id_category
 * @property integer $id_brand
 */
class News extends CActiveRecord
{
    public $title_brand;
    public $title_category;
    public $view_count;
    public $dop_inf = array();
    public $image; // attribute to store uploaded images articles
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text, created', 'required'),
			array('created, id_category, id_brand, view_count', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('img', 'length', 'max'=>40),
            array('image', 'file',
                'types'=>'jpg, gif, png',
                'maxSize'=>1024 * 1024 * 5, // 5 MB
                'allowEmpty'=>'true',
                'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
            ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text, img, id_category, id_brand, title_brand, title_category, view_count', 'safe', 'on'=>'search'),
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
            'brand' => array(self::BELONGS_TO, 'Brand', 'id_brand'),
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
			'id' => 'ID новости',
			'title' => 'Название новости',
			'text' => 'Текст новости',
			'created' => 'Время создания',
			'img' => 'Картинка',
			'id_category' => 'ID категории',
			'id_brand' => 'ID бренда',
			'title_category' => 'Название категории',
			'title_brand' => 'Название бренда',
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
        $view_count_sql = "(select count(*) from $view_table pt where pt.id_object = t.id AND pt.type_object = " .VIEWS::TYPE_NEWS. ')';

        $criteria->with = array('category', 'brand', 'viewCount');
        $criteria->select = array('*', $view_count_sql . ' AS view_count');

        $criteria->condition = 'type_object = ' .VIEWS::TYPE_NEWS. ' OR type_object IS NULL';
        $criteria->group= 't.id';

        $criteria->together = true;

        $criteria->compare('id',$this->id);
        $criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('category.title',$this->title_category,true);
		$criteria->compare('brand.title',$this->title_brand,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('id_brand',$this->id_brand);
		$criteria->compare($view_count_sql,$this->view_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
