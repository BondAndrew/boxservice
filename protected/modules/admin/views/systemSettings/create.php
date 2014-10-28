<?php
/* @var $this SystemSettingsController */
/* @var $model SystemSettings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	'Создать новый System Settings',
);

$this->menu=array(
	array('label'=>'Управление SystemSettings', 'url'=>array('index')),
);
?>

<h1>Создание SystemSettings</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>