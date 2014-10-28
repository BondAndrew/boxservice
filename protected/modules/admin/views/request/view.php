<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Заявки пользователей'=>array('index'),
	'Просмотр заявки',
);

$this->menu=array(
	array('label'=>'Управление заявками', 'url'=>array('index')),
	array('label'=>'Создание новой заявки', 'url'=>array('create')),
	array('label'=>'Изменение данной заявки', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление данной заявки', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы точно хотите удалить данную заявку?')),
);
?>

<h1>Просмотр зявки "<?php echo $model->title; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'text',
        'created'=>array(
            'name' => 'created',
            'value' => DateTime::createFromFormat("U", $model->created)->format("d.m.Y H:i:s"),
        ),
        'time_close_request'=>array(
            'name' => 'time_close_request',
            'value' => DateTime::createFromFormat("U", $model->time_close_request)->format("d.m.Y H:i:s"),
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
            'name'=>'login',
            'type' => 'raw',
            'value'=> isset($model->user) ? CHtml::link($model->user->login, array("user/view", "id"=>$model->id_user)) : "Не задано",
        ),
        'title_city'=>array(
            'name'=>'titleCity',
            'type' => 'raw',
            'value'=> isset($model->city) ? CHtml::link($model->city->title, array('city/index', "City[id]"=>$model->id_city)) : "Не задано",
        ),
        'valuations'=>array(
            'name' => 'valuations',
            'value' => ($model->assessment_working_time)?"Да":"Нет",
        ),
        'assessment_working_time'=>array(
            'name' => 'assessment_working_time',
            'value' => ($model->assessment_working_time)?"Да":"Нет",
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
