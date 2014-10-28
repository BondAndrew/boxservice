<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $dopInf Comment */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	'Просмотр комментария',
);

$this->menu=array(
	array('label'=>'Управление комментариями', 'url'=>array('index')),
	array('label'=>'Изменение данного комментария', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление данного комментария', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить данный комментарий?')),
);
?>

<h1>Просмотр комментария</h1>

<?php
$array_dop_params = ($model->type_object == 'Ответ на заявку')?array('valuations','assessment_working_time'):array();
$path = 'comment/index';
switch ($model->type_object) {
    case 'Ответ на заявку':
        $path = 'request/view';
        break;
    case 'Ответ на вопрос':
        $path = 'question/view';
        break;
    case 'Комментарий новости':
        $path = 'news/view';
        break;
}

$array_attributes = array_merge(array(
                          'login' => array(
                              'name' => 'login',
                              'type' => 'raw',
                              'value' => isset($model->user) ? CHtml::link($model->user->login, array('user/view', 'id'=>$model->id_user)) : "",
                          ),
                          'created' => array(
                              'name' => 'created',
                              'value' => DateTime::createFromFormat("U", $model->created)->format("d.m.Y"),
                              'filter' => false,
                          ),
                          'id_object',
                          'title' => array(
                              'name' => 'Тема комментируемого объекта',
                              'type' => 'raw',
                              'value' => !empty($model->dop_inf) ? CHtml::link($model->dop_inf->title, array($path, 'id'=>$model->dop_inf->id)) : "",
                          ),
                          'text',
                          'type_object',
                          'rating_comment' => array(
                              'name' => 'rating_comment',
                              'value' => $model->rating_comment,
                          ),
                          'admin_check' => array(
                              'name' => 'admin_check',
                              'value' => $model->admin_check ? 'Да' : 'Нет'
                              ),
                          ),$array_dop_params);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>$array_attributes,
)); ?>
