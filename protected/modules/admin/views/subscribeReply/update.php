<?php
/* @var $this SubscribeReplyController */
/* @var $model SubscribeReply */

$this->breadcrumbs=array(
	'Subscribe Replies'=>array('index'),
	'Изменить Subscribe Replies "$model->id"',
);

$this->menu=array(
	array('label'=>'Управление SubscribeReply', 'url'=>array('index')),
	array('label'=>'Создать новый SubscribeReply', 'url'=>array('create')),
);
?>

<h1>Изменить Subscribe Replies <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>