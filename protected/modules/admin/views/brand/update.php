<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Бренд'=>array('index'),
	'Изменить бренд "' . $model->title . '"',
);

$this->menu=array(
	array('label'=>'Создать новый бренд', 'url'=>array('create')),
	array('label'=>'Управление брендами', 'url'=>array('index')),
);
?>

<h1>Изменить бренд "<?php echo $model->title; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>