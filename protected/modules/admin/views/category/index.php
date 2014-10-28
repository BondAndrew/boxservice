<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Категория'=>array('index'),
	'Управление категориями',
);

if (!empty($_GET['Category'])) {
    $this->menu=array(
        array('label'=>'Создание новой категории', 'url'=>array('create')),
        array('label'=>'Просмотр всех категорий', 'url'=>array('index')),
    );
} else {
    $this->menu=array(
        array('label'=>'Создание новой категории', 'url'=>array('create')),
    );
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление категориями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'transliteration',
		array(
			'class'=>'CButtonColumn',
            'viewButtonOptions' => array('style' => 'display:none')
		),
	),
)); ?>
