<?php
/* @var $this SystemSettingsController */
/* @var $model SystemSettings */

$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	'Изменить System Settings "$model->title"',
);

$this->menu=array(
	array('label'=>'Управление SystemSettings', 'url'=>array('index')),
	array('label'=>'Создать новый SystemSettings', 'url'=>array('create')),
);
?>

<h1>Изменить System Settings <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>