<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Заявки пользователей'=>array('index'),
	'Создать новую заявку',
);

$this->menu=array(
	array('label'=>'Управление заявками', 'url'=>array('index')),
);
?>

<h1>Создание новой заявки</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>