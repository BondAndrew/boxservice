<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Вопросы и ответы'=>array('index'),
	'Управление вопросами',
);

$this->menu=array(
	array('label'=>'Создать новый вопрос', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#question-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление вопросами</h1>

<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'question-grid',
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
		'img'=>array(
            'name'=>'img',
            'value'=> 'file_exists(Yii::getPathOfAlias("webroot.images.questions").DIRECTORY_SEPARATOR.$data->img) && !empty($data->img) ? "Есть" : "Нет"',
            'filter' => false,
        ),
		'loginOwner'=>array(
            'name'=>'loginOwner',
            'type' => 'raw',
            'value'=> 'isset($data->owner) ? CHtml::link($data->owner->login, array("user/view", "id"=>$data->id_user)) : "Не задано"',
        ),
		'loginRecipient'=>array(
            'name'=>'loginRecipient',
            'type' => 'raw',
            'value'=> 'isset($data->user) ? CHtml::link($data->user->login, array("user/view", "id"=>$data->question_for_id_user)) : "Для всех"',
        ),
        'titleBrand'=>array(
            'name'=>'titleBrand',
            'type' => 'raw',
            'value'=> 'isset($data->brand) ? CHtml::link($data->brand->title, array("brand/index", "Brand[id]"=>$data->id_brand)) : "Не задано"',
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
                    'url' => 'CHtml::normalizeUrl(array("question/prevent", "id"=>$data->id))',
                    'label' => 'Допустить вопрос',
                    'visible'=>'(!$data->admin_check)'),
            ),
            'template' => '{prevent} {view} {update} {delete}'
		),
	),
)); ?>
