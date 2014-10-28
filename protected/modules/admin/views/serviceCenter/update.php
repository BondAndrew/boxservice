<?php
/* @var $this ServiceCenterController */
/* @var $model ServiceCenter */

$this->breadcrumbs=array(
	'Сервисные центры'=>array('index'),
	'Изменить данные сервисного центра '."$model->name",
);

$this->menu=array(
	array('label'=>'Управление сервисными центрами', 'url'=>array('index')),
	array('label'=>'Создать новый сервисный центр', 'url'=>array('create')),
    array('label'=>'Просмотр данных сервисного центра', 'url'=>array('view', 'id'=>$model->id_center)),
    );
?>

<h1>Изменить данные сервисного центра <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>