<?php
/* @var $this ProductModelController */
/* @var $model ProductModel */

$this->breadcrumbs=array(
	'Модели'=>array('index'),
	'Управление моделями бренда',
);

$this->menu=array(
	array('label'=>'Создать новую модель', 'url'=>array('create')),
);



if (!empty($_GET['DopService'])) {
    $this->menu=array(
        array('label'=>'Создать новую дополнительную услугу сервисных центров', 'url'=>array('create')),
        array('label'=>'Просмотр всех дополнительных услуг сервисных центров', 'url'=>array('index')),
    );
} else {
    $this->menu=array(
        array('label'=>'Создать новую дополнительную услугу сервисных центров', 'url'=>array('create')),
    );
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-model-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление моделями бренда</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-model-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'transliteration',
		'nameBrand'=>array(
            'name' => 'nameBrand',
            'value' => '$data->brand->title',
        ),
		array(
			'class'=>'CButtonColumn',
            'viewButtonOptions' => array('style' => 'display:none')
		),
	),
)); ?>
