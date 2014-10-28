<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Бренд'=>array('index'),
	'Управление',
);

if (!empty($_GET['Brand'])) {
    $this->menu=array(
        array('label'=>'Создание новый бренд', 'url'=>array('create')),
        array('label'=>'Просмотр всех брендов', 'url'=>array('index')),
    );
} else {
    $this->menu=array(
        array('label'=>'Создание новой бренд', 'url'=>array('create')),
    );
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#brand-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление брендами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'brand-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'transliteration',
		array(
			'class'=>'CButtonColumn',
            'viewButtonOptions' => array('style' => 'display:none'),
		),
	),
)); ?>
