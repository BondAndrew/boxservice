<?php

class NewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
        $id = (int)$id;
        $model = $this->loadModel($id);
        $this->getViewsCount($model);
        $this->render('view',array('model'=>$model));
	}

	public function actionIndex()
	{

//		$dataProvider = new CActiveDataProvider('News');

        $brands = Brand::model()->findAll();
        $categories = Category::model()->findAll();

        $model = new CActiveDataProvider('News');
        if(isset($_GET)){
            if(isset($_GET['id_category'])){
                $model = new CActiveDataProvider('News', array(
                    'criteria' => array(
                        'select' => '*',
                        'condition' => 'id_category=:id_category',
                        'params' => array(':id_category' => $_GET['id_category'])
                    ),
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));
            } elseif (isset($_GET['id_brand'])){
                $model = new CActiveDataProvider('News', array(
                    'criteria' => array(
                        'select' => '*',
                        'condition' => 'id_brand=:id_brand',
                        'params' => array(':id_brand' => $_GET['id_brand'])
                    ),
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));
            }
        }
        $this->render('index',array(
            'dataProvider'=>$model,
            'brands' => $brands,
            'categories' => $categories
        ));

	}

    /**
     * Get count views from db
     * @param $model
     */

    private function getViewsCount(&$model) {
        $model->view_count = (int)Views::model()->countByAttributes(array('id_object'=>$model->id,'type_object'=>Views::TYPE_NEWS));
    }


    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return News the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=News::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param News $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
