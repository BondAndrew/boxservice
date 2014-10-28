<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Категория'=>array('index'),
	'Изменить категорию '. $model->title,
);

$this->menu=array(
	array('label'=>'Управление категориями', 'url'=>array('index')),
	array('label'=>'Создание новой категории', 'url'=>array('create')),
);
?>

<h1>Изменить категорию <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>