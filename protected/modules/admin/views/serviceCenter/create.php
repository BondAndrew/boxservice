<?php
/* @var $this ServiceCenterController */
/* @var $model ServiceCenter */

$this->breadcrumbs=array(
	'Сервисные центры'=>array('index'),
	'Создать новый сервисный центр',
);

$this->menu=array(
	array('label'=>'Управление сервисными центрами', 'url'=>array('index')),
);
?>

<h1>Создание сервисного центра</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>