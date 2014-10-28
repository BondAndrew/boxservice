<?php
/* @var $this ViewsController */
/* @var $model Views */

$this->breadcrumbs=array(
	'Views'=>array('index'),
	'Создать новый Views',
);

$this->menu=array(
	array('label'=>'Управление Views', 'url'=>array('index')),
);
?>

<h1>Создание Views</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>