<?php
/* @var $this TransactionsController */
/* @var $model Transactions */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	'Создать новый Transactions',
);

$this->menu=array(
	array('label'=>'Управление Transactions', 'url'=>array('index')),
);
?>

<h1>Создание Transactions</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>