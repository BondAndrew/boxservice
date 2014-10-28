<?php

class QuestionController extends Controller
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
		$model=new Question;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Question']))
		{
            $model->image = CUploadedFile::getInstance($model,'image');
            if ($model->image){
                $model->img = md5(time().$model->image->getName()).'.'.$model->image->getExtensionName();
            }
            $model->created = time();
			$model->attributes=$_POST['Question'];
			if($model->save()) {

                if ($model->image){
                    $file = Yii::getPathOfAlias('webroot.images.questions').DIRECTORY_SEPARATOR.$model->img;
                    $model->image->saveAs($file);
                }
                $this->redirect(array('view','id'=>$model->id));
            }
		}

        $model->dop_inf['brand'] = Brand::model()->getAllBrandIdTitle();
        $model->dop_inf['category'] = Category::model()->getAllCategoryIdTitle();
        $model->dop_inf['city'] = City::model()->getAllCityIdTitle();
        $model->dop_inf['simple_user'] = User::model()->getAllUserIdTitle(1);
        $model->dop_inf['service'] = User::model()->getAllUserIdTitle(2);

        foreach ($model->dop_inf as &$inf) {
            if(empty($inf)) {
                $inf = array('' => 'Результатов нет');
            } else {
                $inf = array('' => 'Не определен') + $inf;
            }
        }

        $model->dop_inf['service'][0] = 'Для всех';

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

		if(isset($_POST['Question']))
		{
            $del_img = isset($_POST['del_img']) ? true : false;
            $model->attributes=$_POST['Question'];
            $model->image = CUploadedFile::getInstance($model,'image');
            if($del_img) {
                if(file_exists(Yii::getPathOfAlias('webroot.images.questions').DIRECTORY_SEPARATOR.$model->img)){
                    unlink('./images/questions/'.$model->img);
                    $model->img = '';
                }
            }
            if ($model->image){
                $model->img = md5(time().$model->image->getName()).'.'.$model->image->getExtensionName();
            }
            if($model->save()) {
                if ($model->image){
                    $file = Yii::getPathOfAlias('webroot.images.questions').DIRECTORY_SEPARATOR.$model->img;
                    $model->image->saveAs($file);
                }
                $this->redirect(array('view','id'=>$model->id));
            }
		}

        $model->dop_inf['brand'] = Brand::model()->getAllBrandIdTitle();
        $model->dop_inf['category'] = Category::model()->getAllCategoryIdTitle();
        $model->dop_inf['city'] = City::model()->getAllCityIdTitle();
        $model->dop_inf['simple_user'] = User::model()->getAllUserIdTitle(1);
        $model->dop_inf['service'] = User::model()->getAllUserIdTitle(2);

        foreach ($model->dop_inf as &$inf) {
            if(empty($inf)) {
                $inf = array('' => 'Результатов нет');
            } else {
                $inf = array('' => 'Не определен') + $inf;
            }
        }

        $model->dop_inf['service'][0] = 'Для всех';

		$this->render('update',array(
			'model'=>$model,
		));
	}

    /**
     * Get count views from db
     * @param $model
     */

    private function getViewsCount(&$model) {
        $model->view_count = (int)Views::model()->countByAttributes(array('id_object'=>$model->id,'type_object'=>Views::TYPE_QUESTION));
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
     * Prevent question.
     */
    public function actionPrevent($id)
    {
        $model = $this->loadModel((int)$id);
        $model->prevent();
        $this->redirect(array('index'));

    }

    /**
    * Manages all models.
    */
    public function actionIndex()
    {
        $model=new Question('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Question']))
            $model->attributes=$_GET['Question'];


        $model->dop_inf['brand'] = Brand::model()->getAllBrandIdTitle();
        $model->dop_inf['category'] = Category::model()->getAllCategoryIdTitle();
        $model->dop_inf['city'] = City::model()->getAllCityIdTitle();
        $model->dop_inf['simple_user'] = User::model()->getAllUserIdTitle(1);
        $model->dop_inf['service'] = User::model()->getAllUserIdTitle(2);

        foreach ($model->dop_inf as &$inf) {
            if(empty($inf)) {
                $inf = array('' => 'Результатов нет');
            } else {
                $inf = array('' => 'Не определен') + $inf;
            }
        }

        $model->dop_inf['service'][0] = 'Для всех';

        $this->render('index',array(
        'model'=>$model,
    ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Question the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Question::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Question $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
