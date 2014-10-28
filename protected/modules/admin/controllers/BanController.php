<?php

class BanController extends Controller
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
				'actions'=>array('create','update', 'index','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ban;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        $error_date = false;
		if(isset($_POST['Ban']))
		{
            if (!empty($_POST['Ban']['finishing'])) {
                if (preg_match ('/([0]?[1-9]|[1|2][0-9]|[3][0|1])\.([0]?[1-9]|[1][0|1|2])\.([2][0-9]{3})/', $_POST['Ban']['finishing'], $regs)) {
                    $_POST['Ban']['finishing'] = "$regs[3]-$regs[2]-$regs[1]";
                } else {
                    $_POST['Ban']['finishing'] = null;
                    $error_date = true;
                }
            } else {
                $_POST['Ban']['finishing'] = null;
            }
            $existUser = (int)User::model()->count('id = :num', array(':num'=>(int)$_POST['Ban']['id_user']));

            if ($existUser) {
                $model->attributes=$_POST['Ban'];
                $existBan = (int)Ban::model()->count('id_user = :num', array(':num'=>(int)$_POST['Ban']['id_user']));

                if ($existBan === 0) {
                    if($model->save() && !$error_date)
                        $this->redirect(array('index'));
                    else
                        $model->addError('finishing', 'Дата введена в неправельном формате.');
                } else {
                    $model->addError('id_user', 'Пользователя с данным ID уже добавлен в бан.');
                }
            } else {
                $model->addError('id_user', 'Пользователя с данным ID не существует.');
            }
		}

        if (!$error_date) {
            $this->render('create',array(
                'model'=>$model,
            ));
        }
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

		if(isset($_POST['Ban']))
		{
            $error_date = false;
            if (!empty($_POST['Ban']['finishing'])) {
                if (preg_match ('/([0]?[1-9]|[1|2][0-9]|[3][0|1])\.([0]?[1-9]|[1][0|1|2])\.([2][0-9]{3})/', $_POST['Ban']['finishing'], $regs)) {
                    $_POST['Ban']['finishing'] = "$regs[3]-$regs[2]-$regs[1]";
                } else {
                    $_POST['Ban']['finishing'] = null;
                    $error_date = true;
                }
            } else {
                $_POST['Ban']['finishing'] = null;
            }
            $existUser = User::model()->count('id = :num', array(':num'=>(int)$_POST['Ban']['id_user']));
            if ($existUser !== 0) {
                $model->attributes=$_POST['Ban'];
                if($model->save() && !$error_date)
                    $this->redirect(array('index'));
            } else {
                $model->addError('id_user', 'Пользователя с данным ID не существует.');
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
        $model=new Ban('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Ban']))
            $model->attributes=$_GET['Ban'];

        $this->render('index',array(
        'model'=>$model,
    ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ban the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ban::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ban $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ban-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
