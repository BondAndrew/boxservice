<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Города'=>array('index'),
	'Изменить параметры города '.$model->title,
);

$this->menu=array(
	array('label'=>'Управление городами', 'url'=>array('index')),
	array('label'=>'Создание нового города', 'url'=>array('create')),
);
?>

<h1>Изменить параметры города <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>