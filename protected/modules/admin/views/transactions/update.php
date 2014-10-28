<?php
/* @var $this TransactionsController */
/* @var $model Transactions */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	'Изменить Transactions "$model->id"',
);

$this->menu=array(
	array('label'=>'Управление Transactions', 'url'=>array('index')),
	array('label'=>'Создать новый Transactions', 'url'=>array('create')),
);
?>

<h1>Изменить Transactions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>