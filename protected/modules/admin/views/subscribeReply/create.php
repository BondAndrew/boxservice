<?php
/* @var $this SubscribeReplyController */
/* @var $model SubscribeReply */

$this->breadcrumbs=array(
	'Subscribe Replies'=>array('index'),
	'Создать новый Subscribe Replies',
);

$this->menu=array(
	array('label'=>'Управление SubscribeReply', 'url'=>array('index')),
);
?>

<h1>Создание SubscribeReply</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>