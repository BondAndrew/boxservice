<?php
/* @var $this DopServiceController */
/* @var $model DopService */

$this->breadcrumbs=array(
	'Дополнительные услуги сервисных центров'=>array('index'),
	'Управление дополнительными услугами',
);

$this->menu=array(
	array('label'=>'Создать новую дополнительную услугу сервисных центров', 'url'=>array('create')),
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
	$('#dop-service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление дополнительными услугами сервисных центров</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dop-service-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'description',
		array(
			'class'=>'CButtonColumn',
            'viewButtonOptions' => array('style' => 'display:none')
		),
	),
)); ?>
