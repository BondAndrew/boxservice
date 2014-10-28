<?php
/* @var $this DopServiceController */
/* @var $model DopService */

$this->breadcrumbs=array(
	'Дополнительные услуги сервисных центров'=>array('index'),
	'Изменить дополнительную услугу '.$model->title,
);

$this->menu=array(
	array('label'=>'Управление дополнительными услугами', 'url'=>array('index')),
	array('label'=>'Создать новую дополнительную услугу', 'url'=>array('create')),
);
?>

<h1>Изменение дополнительной услуги <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>