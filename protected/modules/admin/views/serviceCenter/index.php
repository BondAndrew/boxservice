<?php
/* @var $this ServiceCenterController */
/* @var $model ServiceCenter */

$this->breadcrumbs=array(
	'Сервисные центры'=>array('index'),
	'Управление сервисными центрами',
);

$this->menu=array(
	array('label'=>'Создать новый сервисный центр', 'url'=>array('create')),
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

<h1>Управление сервисными центрами</h1>

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
        'login'=>array(
            'name'=>'login',
            'type' => 'raw',
            'value'=> 'isset($data->user) ? CHtml::link($data->user->login, array("user/view", "id"=>$data->id_user)) : "Не задано"',
        ),
		'name',
		'email_officially',
		'telephone',
        'title_city'=>array(
            'name'=>'title_city',
            'type' => 'raw',
            'value'=> 'isset($data->city) ? CHtml::link($data->city->title, array("city/index", "id"=>$data->id_city)) : "Не задано"',
        ),
        'count_views'=>array(
            'name'=>'count_views',
            'value'=>'$data->count_views',
        ),
        'check_user'=>array(
            'name' => 'check_user',
            'value' => '($data->user->check_user)?"Да":"Нет"',
            'filter' => CHtml::listData(array(array('value'=>'Все', 'key'=>''),array('value'=>'Да', 'key'=>'1'),array('value'=>'Нет', 'key'=>'0')), 'key', 'value'),
        ),
        array(
            'class'=>'CButtonColumn',
            'buttons' => array(
                'prevent' => array(
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/check.png',
                    'url' => 'CHtml::normalizeUrl(array("servicecenter/prevent", "id"=>$data->id_center))',
                    'label' => 'Допустить сервисный центр',
                    'visible'=>'(!$data->user->check_user)'),
            ),
            'template' => '{prevent} {view} {update} {delete}'
        ),
	),
)); ?>
