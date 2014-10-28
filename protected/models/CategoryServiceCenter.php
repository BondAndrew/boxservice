<?php

/**
 * This is the model class for table "{{category_service_center}}".
 *
 * The followings are the available columns in table '{{category_service_center}}':
 * @property integer $id
 * @property integer $id_category
 * @property integer $id_center
 */
class CategoryServiceCenter extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category_service_center}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_category, id_center', 'required'),
			array('id_category, id_center', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_category, id_center', 'safe', 'on'=>'search'),
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
            'serviceCenter' => array(self::HAS_ONE, 'ServiceCenter', 'id_center'),
            'category' => array(self::HAS_ONE, 'Category', array('id'=>'id_category')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_category' => 'Id Category',
			'id_center' => 'Id Center',
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
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('id_center',$this->id_center);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @param $id_center
     * @return array with category`s title
     */

    static function getCategoryByIDCenter($id_center) {

        $id_center = (int)$id_center;
        $ret = array();

        if (!empty($id_center)) {
            $criteria = new CDbCriteria;
            $tableCategory = Category::model()->tableName();
            $criteria->alias = 'csc';
            $criteria->join = "LEFT JOIN $tableCategory ON $tableCategory.`id` = `id_category`";
            $criteria->condition = '`id_center` = :id_center';
            $criteria->params = array(':id_center'=>$id_center);
            $criteria->together = true;
            $criteria->select = array('*');
            $criteria->with = array('category');
            $titleCategories = self::model()->findAll($criteria);

            if (!empty($titleCategories)) {
                foreach ($titleCategories as $category) {
                    $ret[$category->category->id] = $category->category->title;
                }
            }
        }
        return $ret;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoryServiceCenter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
