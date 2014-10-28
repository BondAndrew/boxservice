<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Вопросы и ответы'=>array('index'),
	'Изменить вопрос "'. $model->title .'"',
);

$this->menu=array(
	array('label'=>'Управление вопросами', 'url'=>array('index')),
	array('label'=>'Создать новый вопрос', 'url'=>array('create')),
    array('label'=>'Просмотр данного вопроса', 'url'=>array('view', 'id'=>$model->id)),
    );
?>

<h1>Изменить вопрос</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>