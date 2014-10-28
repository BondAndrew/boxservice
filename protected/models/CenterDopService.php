<?php

/**
 * This is the model class for table "{{center_dop_service}}".
 *
 * The followings are the available columns in table '{{center_dop_service}}':
 * @property integer $id
 * @property integer $id_center
 * @property integer $id_dop_service
 */
class CenterDopService extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{center_dop_service}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_center, id_dop_service', 'required'),
			array('id_center, id_dop_service', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_center, id_dop_service', 'safe', 'on'=>'search'),
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
            'dopService' => array(self::HAS_ONE, 'DopService', array('id'=>'id_dop_service')),
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
			'id_dop_service' => 'Id Dop Service',
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
		$criteria->compare('id_dop_service',$this->id_dop_service);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @param $id_center
     * @return array with dop service`s title
     */


    static function getDopServiceByIDCenter($id_center) {

        $id_center = (int)$id_center;
        $ret = array();

        if (!empty($id_center)) {
            $criteria = new CDbCriteria;
            $tableDopService = DopService::model()->tableName();
            $criteria->alias = 'cds';
            $criteria->join = "LEFT JOIN $tableDopService ON $tableDopService.`id` = `id_dop_service`";
            $criteria->condition = '`id_center` = :id_center';
            $criteria->params = array(':id_center'=>$id_center);
            $criteria->together = true;
            $criteria->select = array('*');
            $criteria->with = array('dopService');
            $titleDopService = self::model()->findAll($criteria);

            if (!empty($titleDopService)) {
                foreach ($titleDopService as $dopService) {
                    $ret[$dopService->dopService->id] = $dopService->dopService->title.' ('.$dopService->dopService->description.')';
                }
            }
        }
        return $ret;
    }




    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CenterDopService the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
