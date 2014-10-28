<?php

/**
 * This is the model class for table "{{center_brand}}".
 *
 * The followings are the available columns in table '{{center_brand}}':
 * @property integer $id
 * @property integer $id_center
 * @property integer $id_brand
 */
class CenterBrand extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{center_brand}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_center, id_brand', 'required'),
			array('id_center, id_brand', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_center, id_brand', 'safe', 'on'=>'search'),
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
            'brand' => array(self::HAS_ONE, 'Brand', array('id'=>'id_brand')),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_center' => 'Id Center',
			'id_brand' => 'Id Brand',
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
		$criteria->compare('id_center',$this->id_center);
		$criteria->compare('id_brand',$this->id_brand);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @param $id_center
     * @return array with brand`s title
     */


    static function getBrandByIDCenter($id_center) {

        $id_center = (int)$id_center;
        $ret = array();

        if (!empty($id_center)) {
            $criteria = new CDbCriteria;
            $tableBrand = Brand::model()->tableName();
            $criteria->alias = 'cb';
            $criteria->join = "LEFT JOIN $tableBrand ON $tableBrand.`id` = `id_brand`";
            $criteria->condition = '`id_center` = :id_center';
            $criteria->params = array(':id_center'=>$id_center);
            $criteria->together = true;
            $criteria->select = array('*');
            $criteria->with = array('brand');
            $titleBrand = self::model()->findAll($criteria);

            if (!empty($titleBrand)) {
                foreach ($titleBrand as $brand) {
                    $ret[$brand->brand->id] = $brand->brand->title;
                }
            }
        }
        return $ret;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CenterBrand the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
