<?php
/* @var $this BanController */
/* @var $model Ban */

$this->breadcrumbs=array(
	'Бан'=>array('index'),
	'Управление пользователями, которых добавили в бан.',
);

$this->menu=array(
	array('label'=>'Добавление пользователя в бан', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ban-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пользователями, которых добавили в бан.</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ban-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_user',
        'login'=>array(
            'name'=>'login',
            'type'=>'raw',
            'value'=> 'isset($data->user) ? CHtml::link($data->user->login, array("user/view", "id"=>$data->id_user)) : ""',
        ),
		'finishing'=>array(
            'name' => 'finishing',
            'value' => '(is_null($data->finishing))?"Бессрочный бан":DateTime::createFromFormat("Y-m-d", $data->finishing)->format("d.m.Y")',
            'filter' => false,
        ),
		'description',
        array(
            'class'=>'CButtonColumn',
            'viewButtonOptions' => array('style' => 'display:none'),
        ),
	),
)); ?>
