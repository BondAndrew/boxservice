<?php

/* @var $this ServiceCenterController */
/* @var $model ServiceCenter */

$this->breadcrumbs=array(
	'Сервисные центры'=>array('index'),
	'Просмотр сервисного центра '. $model->name,
);

$this->menu=array(
	array('label'=>'Управление сервисными центрами', 'url'=>array('index')),
	array('label'=>'Создание нового сервисного центра', 'url'=>array('create')),
	array('label'=>'Изменение данного сервисный центр', 'url'=>array('update', 'id'=>$model->id_center)),
	array('label'=>'Удаление данного сервисного центра', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_center),'confirm'=>'Вы точно хотите удалить данный сервисный центр?')),
);
?>

<h1>Просмотр Сервисного центра "<?php echo $model->name; ?>"</h1>

<?php
$this->getMap($model);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'login'=>array(
            'name'=>'login',
            'value'=> isset($model->user) ? $model->user->login : 'Не задано',
        ),
        'id_center',
        'name'=>array(
            'name'=>'name',
            'value'=> !empty($model->name) ? $model->name : 'Не задано',
        ),
        'username'=>array(
            'name'=>'username',
            'value'=> isset($model->user) ? $model->user->username : 'Не задано',
        ),
        'send_notification'=>array(
            'name'=>'send_notification',
            'value'=> !empty($model->user->send_notification) ? 'Да' : 'Нет',
        ),
        'email'=>array(
            'name'=>'email',
            'value'=> isset($model->user) ? $model->user->email : 'Не задано',
        ),
        'img'=>array(
            'name'=>'img',
            'type' => 'raw',
            'value'=> !empty($model->user->img) ? html_entity_decode($this->post_image($model->user->username, $model->user->img, '150','small_img left', 'questions')): 'Нет',
        ),
        'check_user'=>array(
            'name'=>'check_user',
            'value'=> !empty($model->user->check_user) ? 'Да' : 'Нет',
        ),
        'time_registration'=>array(
            'name' => 'time_registration',
            'filter' => false,
            'value'=> !empty($model->user->time_registration) ? DateTime::createFromFormat("U", $model->user->time_registration)->format("d.m.Y") : 'Не задано',
        ),
		'email_officially',
		'telephone',
        'title_city'=>array(
            'name'=>'title_city',
            'type' => 'raw',
            'value'=> isset($model->city) ? CHtml::link($model->city->title, array('city/index', "City[id]"=>$model->id_city)) : 'Не задано',
        ),
		'street',
		'working_hours',
		'dop_info',
		'site',
		'transliteration',
		'personal_questions'=>array(
            'name' => 'personal_questions',
            'filter' => false,
            'value'=> !empty($model->personal_questions) ? 'Да' : 'Нет',
        ),
        'title_category'=>array(
            'name' => 'title_category',
            'type' => 'raw',
            'value'=> !empty($model->title_category) ? $model->title_category : 'Не задано',
        ),
        'title_dop_service'=>array(
            'name' => 'title_dop_service',
            'type' => 'raw',
            'value'=> !empty($model->title_dop_service) ? $model->title_dop_service : 'Не задано',
        ),
        'count_views'=>array(
            'name' => 'count_views',
            'filter' => false,
            'value'=> !empty($model->count_views) ? $model->count_views : 0,
        ),
        'title_brand'=>array(
            'name' => 'title_brand',
            'type' => 'raw',
            'value'=> !empty($model->title_brand) ? $model->title_brand : 'Не задано',
        ),
	),
));

?>

