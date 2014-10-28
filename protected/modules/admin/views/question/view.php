<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Вопросы и ответы'=>array('index'),
	'Просмотр вопроса "'. $model->title .'"',
);

$this->menu=array(
	array('label'=>'Управление вопросами', 'url'=>array('index')),
	array('label'=>'Создание нового вопроса', 'url'=>array('create')),
	array('label'=>'Изменение данного вопроса', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление данного вопроса', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы точно хотите удалить данный объект')),
);
?>

<h1>Просмотр вопроса</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'text',
        'created'=>array(
            'name' => 'created',
            'value' => DateTime::createFromFormat("U", $model->created)->format("d.m.Y H:i:s"),
            'filter' => false,
        ),
        'img'=>array(
            'name'=>'img',
            'type' => 'raw',
            'value'=> !empty($model->img) ? html_entity_decode($this->post_image($model->title, $model->img, '150','small_img left', 'questions')): "Нет",
        ),
        'title_category'=>array(
            'name'=>'titleCategory',
            'type' => 'raw',
            'value'=> isset($model->category) ? CHtml::link($model->category->title, array('category/index', "Category[id]"=>$model->id_category)) : "Не задано",
        ),
        'title_brand'=>array(
            'name'=>'titleBrand',
            'type' => 'raw',
            'value'=> isset($model->brand) ? CHtml::link($model->brand->title, array('brand/index', "Brand[id]"=>$model->id_brand)) : "Не задано",
        ),
        'loginOwner'=>array(
            'name'=>'loginOwner',
            'type' => 'raw',
            'value'=> isset($model->owner) ? CHtml::link($model->owner->login, array("user/view", "id"=>$model->id_user)) : "Не задано",
        ),
		'title_city'=>array(
            'name'=>'titleCity',
            'type' => 'raw',
            'value'=> isset($model->city) ? CHtml::link($model->city->title, array('city/index', "City[id]"=>$model->id_city)) : "Не задано",
        ),
        'loginRecipient'=>array(
            'name'=>'loginRecipient',
            'type' => 'raw',
            'value'=> isset($model->user) ? CHtml::link($model->user->login, array("user/view", "id"=>$model->question_for_id_user)) : "Для всех",
        ),
        'view_count'=>array(
            'name'=>'view_count',
            'value'=> $model->view_count,
        ),
        'admin_check'=>array(
            'name' => 'admin_check',
            'value' => ($model->admin_check)?"Да":"Нет",
        ),
	),
)); ?>
