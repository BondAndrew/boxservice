<?php

/**
 * This is the model class for table "{{product_model}}".
 *
 * The followings are the available columns in table '{{product_model}}':
 * @property integer $id
 * @property integer $id_brand
 * @property string $title
 * @property string $transliteration
 */
class ProductModel extends CActiveRecord
{
    public $nameBrand;
    public $dopInf = array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product_model}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_brand, title, transliteration', 'required'),
			array('id_brand', 'numerical', 'integerOnly'=>true),
			array('title, transliteration, nameBrand', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_brand, title, transliteration, nameBrand', 'safe', 'on'=>'search'),
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
            'brand' => array(self::BELONGS_TO, 'Brand', 'id_brand'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID модели',
			'id_brand' => 'ID бренда',
			'title' => 'Название',
			'transliteration' => 'Пропись латиницей (для ссылок)',
			'nameBrand' => 'Название бренда',
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
             'brand'=>array(
                'select' => array('title'),
             )
        );

        $criteria->together = true;

        $criteria->compare('id',$this->id);
		$criteria->compare('id_brand',$this->id_brand);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('transliteration',$this->transliteration,true);
		$criteria->compare('brand.title',$this->nameBrand,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
