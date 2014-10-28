<?php
/* @var $this ServiceCenterController */
/* @var $model ServiceCenter */

$this->breadcrumbs=array(
	'Service Centers'=>array('index'),
	'Управление Service Centers',
);

$this->menu=array(
	array('label'=>'Создать новый ServiceCenter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#service-center-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Service Centers</h1>

<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-center-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_center',
		'id_user',
		'name',
		'email_officially',
		'telephone',
		'id_city',
		/*
		'street',
		'coordinates',
		'working_hours',
		'dop_info',
		'site',
		'transliteration',
		'personal_questions',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
