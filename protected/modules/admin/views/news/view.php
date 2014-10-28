<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Просмотр новости',
);

$this->menu=array(
	array('label'=>'Управление новостями', 'url'=>array('index')),
	array('label'=>'Создать новую новость', 'url'=>array('create')),
	array('label'=>'Изменить данную новости', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить данную новость', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены что хотите удалить данную новость?')),
);
?>

<h1>Просмотр новости "<?=$model->title?>"</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'id',
		'title',
		'text',
        'created'=>array(
            'name' => 'created',
            'value' => DateTime::createFromFormat("U", $model->created)->format("d.m.Y"),
            'filter' => false,
        ),
		'img'=>array(
            'name'=>'img',
            'type' => 'raw',
            'value'=> !empty($model->img) ? html_entity_decode($this->post_image($model->title, $model->img, '150','small_img left')): "Нет",
        ),
        'view_count'=>array(
            'name'=>'view_count',
            'value'=> $model->view_count,
        ),
        'title_category'=>array(
            'name'=>'title_category',
            'type' => 'raw',
            'value'=> isset($model->category) ? CHtml::link($model->category->title, array('category/index', "Category[id]"=>$model->id_category)) : "",
        ),
        'title_brand'=>array(
            'name'=>'title_brand',
            'type' => 'raw',
            'value'=> isset($model->brand) ? CHtml::link($model->brand->title, array('brand/index', "Brand[id]"=>$model->id_brand)) : "",
        ),
	),
)); ?>
