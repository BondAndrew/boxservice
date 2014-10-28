<?php
/* @var $this DopServiceController */
/* @var $model DopService */

$this->breadcrumbs=array(
	'Дополнительные услуги сервисных центров'=>array('index'),
	'Создать новую дополнительную услугу',
);

$this->menu=array(
	array('label'=>'Управление дополнительными услугами', 'url'=>array('index')),
);
?>

<h1>Создание новой дополнительной услуги</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>