<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Заявки пользователей'=>array('index'),
	'Изменить заявку',
);

$this->menu=array(
	array('label'=>'Управление заявками', 'url'=>array('index')),
	array('label'=>'Создать новую заявку', 'url'=>array('create')),
    array('label'=>'Просмотр данной заявки', 'url'=>array('view', 'id'=>$model->id)),
    );
?>

<h1>Изменить заявку "<?php echo $model->title; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>