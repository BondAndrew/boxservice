<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Бренд'=>array('index'),
	'Создать новый бренд',
);

$this->menu=array(
	array('label'=>'Управление брендами', 'url'=>array('index')),
);
?>

<h1>Создать новый бренд</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>