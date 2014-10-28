<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Заявки пользователей'=>array('index'),
	'Управление заявками',
);

$this->menu=array(
	array('label'=>'Создать новую заявку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#request-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление заявками</h1>

<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'request-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
        'text'=>array(
            'name'=>'text',
            'value'=>'implode(" ",array_slice(explode(" ",$data->text),0,100))."..."'
        ),
        'created'=>array(
            'name' => 'created',
            'value' => 'DateTime::createFromFormat("U", $data->created)->format("H:m:s d.m.Y")',
            'filter' => false,
        ),
        'time_close_request'=>array(
            'name' => 'time_close_request',
            'value' => 'DateTime::createFromFormat("U", $data->time_close_request)->format("H:m:s d.m.Y")',
            'filter' => false,
        ),
        'login'=>array(
            'name'=>'login',
            'type' => 'raw',
            'value'=> 'isset($data->user) ? CHtml::link($data->user->login, array("user/view", "id"=>$data->id_user)) : ""',
        ),
        'view_count'=>array(
            'name'=>'view_count',
            'value'=>'$data->view_count',
        ),
        'admin_check'=>array(
            'name' => 'admin_check',
            'value' => '($data->admin_check)?"Да":"Нет"',
            'filter' => CHtml::listData(array(array('value'=>'Все', 'key'=>''),array('value'=>'Да', 'key'=>'1'),array('value'=>'Нет', 'key'=>'0')), 'key', 'value'),
        ),
        array(
            'class'=>'CButtonColumn',
            'buttons' => array(
                'prevent' => array(
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/check.png',
                    'url' => 'CHtml::normalizeUrl(array("request/prevent", "id"=>$data->id))',
                    'label' => 'Допустить вопрос',
                    'visible'=>'(!$data->admin_check)'),
            ),
            'template' => '{prevent} {view} {update} {delete}'
        ),
	),
)); ?>
