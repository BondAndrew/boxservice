<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Города'=>array('index'),
	'Управление городами',
);

$this->menu=array(
	array('label'=>'Создание нового города', 'url'=>array('create')),
);


if (!empty($_GET['City'])) {
    $this->menu=array(
        array('label'=>'Создание новый города', 'url'=>array('create')),
        array('label'=>'Просмотр всех городов', 'url'=>array('index')),
    );
} else {
    $this->menu=array(
        array('label'=>'Создание новой города', 'url'=>array('create')),
    );
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#city-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление городами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'city-grid',
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
