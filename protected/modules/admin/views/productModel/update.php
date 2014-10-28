<?php
/* @var $this ProductModelController */
/* @var $model ProductModel */

$this->breadcrumbs=array(
	'Модели'=>array('index'),
	'Изменить модель '.$model->title,
);

$this->menu=array(
	array('label'=>'Управление моделями бренда', 'url'=>array('index')),
	array('label'=>'Создать новую модель', 'url'=>array('create')),
);
?>

<h1>Изменить модель <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>