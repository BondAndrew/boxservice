<?php

class CommentController extends Controller
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
        $this->getObjectInf($model);
        $this->getRatingCount($model);
        $this->render('view',array(
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

		if(isset($_POST['Comment']))
		{
			$model->attributes=$_POST['Comment'];
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
        $model=new Comment('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Comment']))
            $model->attributes=$_GET['Comment'];

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    /**
     * Get inf about object count from db
     * @param $model
     */

    private function getObjectInf(&$model) {
        switch ($model->type_object) {
            case Comment::REQUEST:
                $model->dop_inf = Request::model()->findByPk($model->id_object);
                break;
            case Comment::QUESTION:
                $model->dop_inf = Question::model()->findByPk($model->id_object);
                break;
            case Comment::NEWS:
                $model->dop_inf = News::model()->findByPk($model->id_object);
                break;
        }
    }

    /**
     * Get rating count from db
     * @param $model
     */

    private function getRatingCount(&$model) {
        $model->rating_comment = (int)RatingComment::model()->countByAttributes(array('id_comment'=>$model->id));
    }

    /**
    * Prevent comment.
    */
    public function actionPrevent($id)
    {
        $model=$this->loadModel((int)$id);
        $model->prevent();
        $this->redirect(array('index'));

    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Comment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Comment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Comment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
