<?php
/* @var $this BanController */
/* @var $model Ban */

$this->breadcrumbs=array(
	'Бан'=>array('index'),
	'Изменить бан пользователя '.$model->user->login,
);

$this->menu=array(
	array('label'=>'Управление пользователями, которых добавили в бан', 'url'=>array('index')),
	array('label'=>'Добавление пользователя в бан', 'url'=>array('create')),
);
?>

<h1>Изменить бан пользователя <?php echo $model->user->login; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>