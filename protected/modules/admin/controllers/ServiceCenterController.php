<?php
class ServiceCenterController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','update', 'index','delete','view','prevent'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    /**
    * Displays a particular model.
    * @param integer $id the ID of the model to be displayed
    */
    public function actionView($id)
    {
        $model = $this->loadModel($id);
        self::getTitle($model);

        $this->render('view',array(
            'model'=>$model,
        ));
    }

    private function getTitle (&$model) {
        $model->title_category = self::titleFromArrayToStr(CategoryServiceCenter::getCategoryByIDCenter($model->id_center), 'Category', true);
        $model->title_brand = self::titleFromArrayToStr(CenterBrand::getBrandByIDCenter($model->id_center), 'Brand', true);
        $model->title_dop_service = self::titleFromArrayToStr(CenterDopService::getDopServiceByIDCenter($model->id_center), 'DopService', true);
    }

    private function titleFromArrayToStr ($array, $type = 'category', $link = false) {
        $str = '';
        if (!is_array($array)) {
            $str = $array;
        } elseif (!empty($array)) {
            if ($link) {
                foreach ($array as $id => $title) {
                    $str .= CHtml::link($title, array($type.'/index', $type.'[id]'=>$id)) . ', ';
                }
                $str = substr($str, 0, -2);
            } else {
                $str = implode(', ', $array);
            }
        }
        return $str;
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ServiceCenter;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ServiceCenter']))
		{
			$model->attributes=$_POST['ServiceCenter'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ServiceCenter']))
		{
			$model->attributes=$_POST['ServiceCenter'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

    /**
    * Manages all models.
    */
    public function actionIndex()
    {
        $model=new ServiceCenter('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['ServiceCenter']))
            $model->attributes=$_GET['ServiceCenter'];

        $this->render('index',array(
        'model'=>$model,
    ));
    }

    /**
     * Prevent service center.
     */
    public function actionPrevent($id)
    {
        $model=$this->loadModel((int)$id);
        User::model()->findByPk($model->id_user)->prevent();
        $this->redirect(array('index'));

    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ServiceCenter the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ServiceCenter::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ServiceCenter $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='service-center-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
