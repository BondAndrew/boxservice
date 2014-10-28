<?php
/* @var $this ProductModelController */
/* @var $model ProductModel */

$this->breadcrumbs=array(
	'Модели'=>array('index'),
	'Создание новой модели',
);

$this->menu=array(
	array('label'=>'Управление моделями бренда', 'url'=>array('index')),
);
?>

<h1>Создание новой модели</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>