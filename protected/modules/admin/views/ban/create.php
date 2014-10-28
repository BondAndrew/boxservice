<?php
/* @var $this BanController */
/* @var $model Ban */

$this->breadcrumbs=array(
	'Бан'=>array('index'),
	'Добавить пользователя в бан',
);

$this->menu=array(
	array('label'=>'Управление пользователями, которых добавили в бан', 'url'=>array('index')),
);
?>

<h1>Добавить пользователя в бан</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>