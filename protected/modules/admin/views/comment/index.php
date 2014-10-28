<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	'Управление комментариями',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление комментариями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'login'=>array(
            'name'=>'login',
            'type'=>'raw',
            'value'=> 'isset($data->user) ? CHtml::link($data->user->login, array("user/view", "id"=>$data->id_user)) : ""',
        ),
        'created'=>array(
            'name' => 'created',
            'value' => 'DateTime::createFromFormat("U", $data->created)->format("d.m.Y")',
            'filter' => false,
        ),
		'text',
		'type_object'=>array(
            'name' => 'type_object',
            'filter' => CHtml::listData(array(array('value'=>'Ответ на заявку'),array('value'=>'Ответ на вопрос'),array('value'=>'Комментарий новости')), 'value', 'value'),
        ),
        'rating_comment'=>array(
            'name'=>'rating_comment',
            'value'=>'$data->rating_comment',
        ),
        'admin_check'=>array(
            'name' => 'admin_check',
            'value' => '($data->admin_check)?"Да":"Нет"',
            'filter' => CHtml::listData(array(array('value'=>'Да', 'key'=>'1'),array('value'=>'Нет', 'key'=>'0')), 'key', 'value'),
        ),
		array(
			'class'=>'CButtonColumn',
            'buttons' => array(
                'prevent' => array(
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/check.png',
                    'url' => 'CHtml::normalizeUrl(array("comment/prevent", "id"=>$data->id))',
                    'label' => 'Допустить коментарий',
                    'visible'=>'(!$data->admin_check)'),
            ),
            'template' => '{prevent} {view} {update} {delete}'
		),
	),
)); ?>
