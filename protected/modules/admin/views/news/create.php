<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Создать новую новость',
);

$this->menu=array(
	array('label'=>'Управление новостями', 'url'=>array('index')),
);
?>

<h1>Создание новости</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>