<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Категория'=>array('index'),
	'Создание новой категории',
);

$this->menu=array(
	array('label'=>'Управление категориями', 'url'=>array('index')),
);
?>

<h1>Создание новой категории</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>