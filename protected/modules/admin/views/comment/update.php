<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	'Изменить комментарий',
);

$this->menu=array(
	array('label'=>'Управление комментариями', 'url'=>array('index')),
    array('label'=>'Просмотр данного комментария', 'url'=>array('view', 'id'=>$model->id)),
    );
?>

<h1>Изменить комментарий</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>