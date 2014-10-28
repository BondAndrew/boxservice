<?php
/* @var $this ViewsController */
/* @var $model Views */

$this->breadcrumbs=array(
	'Views'=>array('index'),
	'Изменить Views "$model->id"',
);

$this->menu=array(
	array('label'=>'Управление Views', 'url'=>array('index')),
	array('label'=>'Создать новый Views', 'url'=>array('create')),
);
?>

<h1>Изменить Views <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>