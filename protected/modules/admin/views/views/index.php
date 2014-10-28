<?php
/* @var $this ViewsController */
/* @var $model Views */

$this->breadcrumbs=array(
	'Views'=>array('index'),
	'Управление Views',
);

$this->menu=array(
	array('label'=>'Создать новый Views', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#views-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Views</h1>

<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'views-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_ip',
		'time_viewing',
		'id_object',
		'type_object',
		array(
			'class'=>'CButtonColumn',
            'viewButtonOptions' => array('style' => 'display:none')
		),
	),
)); ?>
