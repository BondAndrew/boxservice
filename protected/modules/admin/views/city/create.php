<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Города'=>array('index'),
	'Создать новый город',
);

$this->menu=array(
	array('label'=>'Управление городами', 'url'=>array('index')),
);
?>

<h1>Создать новый город</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>