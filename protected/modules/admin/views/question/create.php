<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Вопросы и ответы'=>array('index'),
	'Создать новый вопрос',
);

$this->menu=array(
	array('label'=>'Управление вопросами', 'url'=>array('index')),
);
?>

<h1>Создание вопроса</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>