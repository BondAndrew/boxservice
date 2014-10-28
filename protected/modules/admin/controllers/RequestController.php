<?php

class RequestController extends Controller
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
        $this->getViewsCount($model);
        $this->render('view',array('model'=>$model));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Request;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


        if(isset($_POST['Request']))
        {
            $error_date = false;
            if (!empty($_POST['Request']['time_close_request'])) {
                if (preg_match ('/([0]?[1-9]|[1|2][0-9]|[3][0|1])\.([0]?[1-9]|[1][0|1|2])\.([2][0-9]{3})/', $_POST['Request']['time_close_request'], $regs)) {
                    $_POST['Request']['time_close_request'] = DateTime::createFromFormat("d.m.Y","$regs[1].$regs[2].$regs[3]")->format('U');
                } else {
                    $_POST['Request']['time_close_request'] = null;
                    $error_date = true;
                }
            }
            $model->created = time();
            $model->attributes=$_POST['Request'];
            if($model->save()) {
                if (!$error_date)
                  $this->redirect(array('index'));
                else
                  $model->addError('time_close_request', 'Дата введена в неправельном формате.');
            }
        }

        $model->dop_inf['brand'] = Brand::model()->getAllBrandIdTitle();
        $model->dop_inf['category'] = Category::model()->getAllCategoryIdTitle();
        $model->dop_inf['city'] = City::model()->getAllCityIdTitle();
        $model->dop_inf['user'] = User::model()->getAllUserIdTitle();

        foreach ($model->dop_inf as &$inf) {
            if(empty($inf)) {
                $inf = array('' => 'Результатов нет');
            } else {
                $inf = array('' => 'Не определен') + $inf;
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
	}

    /**
     * Prevent request.
     */
    public function actionPrevent($id)
    {
        $model = $this->loadModel((int)$id);
        $model->prevent();
        $this->redirect(array('index'));

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

        if(isset($_POST['Request']))
        {
            $error_date = false;
            if (!empty($_POST['Request']['time_close_request'])) {
                if (preg_match ('/([0]?[1-9]|[1|2][0-9]|[3][0|1])\.([0]?[1-9]|[1][0|1|2])\.([2][0-9]{3})/', $_POST['Request']['time_close_request'], $regs)) {
                    $_POST['Request']['time_close_request'] = DateTime::createFromFormat("d.m.Y","$regs[1].$regs[2].$regs[3]")->format('U');
                } else {
                    $_POST['Request']['time_close_request'] = null;
                    $error_date = true;
                }
            }
            $model->attributes=$_POST['Request'];
            if($model->save()) {
                if (!$error_date)
                    $this->redirect(array('index'));
                else
                    $model->addError('time_close_request', 'Дата введена в неправельном формате.');
            }
        }

        $model->dop_inf['brand'] = Brand::model()->getAllBrandIdTitle();
        $model->dop_inf['category'] = Category::model()->getAllCategoryIdTitle();
        $model->dop_inf['city'] = City::model()->getAllCityIdTitle();
        $model->dop_inf['user'] = User::model()->getAllUserIdTitle();

        foreach ($model->dop_inf as &$inf) {
            if(empty($inf)) {
                $inf = array('' => 'Результатов нет');
            } else {
                $inf = array('' => 'Не определен') + $inf;
            }
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
        $model=new Request('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Request']))
            $model->attributes=$_GET['Request'];

        $model->dop_inf['brand'] = Brand::model()->getAllBrandIdTitle();
        $model->dop_inf['category'] = Category::model()->getAllCategoryIdTitle();
        $model->dop_inf['city'] = City::model()->getAllCityIdTitle();
        $model->dop_inf['user'] = User::model()->getAllUserIdTitle();

        foreach ($model->dop_inf as &$inf) {
            if(empty($inf)) {
                $inf = array('' => 'Результатов нет');
            } else {
                $inf = array('' => 'Не определен') + $inf;
            }
        }

        $this->render('index',array(
        'model'=>$model,
    ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Request the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Request::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    /**
     * Get count views from db
     * @param $model
     */

    private function getViewsCount(&$model) {
        $model->view_count = (int)Views::model()->countByAttributes(array('id_object'=>$model->id,'type_object'=>Views::TYPE_REQUEST));
    }

	/**
	 * Performs the AJAX validation.
	 * @param Request $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-form')
		{
            if (!empty($_POST['Request']) && is_array($_POST['Request'])) {
                foreach ($_POST['Request'] as &$attributes) {
                    if (empty($attributes)) {
                        $attributes = '';
                    }
                }
            }
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
