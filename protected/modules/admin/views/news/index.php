<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Управление новостями',
);

$this->menu=array(
	array('label'=>'Создать новую новость', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление новостями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'id',
		'title',
		'text'=>array(
            'name'=>'text',
            'value'=>'implode(" ",array_slice(explode(" ",$data->text),0,100))."..."'
        ),
		'created'=>array(
            'name' => 'created',
            'value' => 'DateTime::createFromFormat("U", $data->created)->format("d.m.Y")',
            'filter' => false,
        ),
		'img'=>array(
            'name'=>'img',
            'value'=> 'file_exists(Yii::getPathOfAlias("webroot.images.news").DIRECTORY_SEPARATOR.$data->img) && !empty($data->img) ? "Есть" : "Нет"',
            'filter' => false,
        ),
        'view_count'=>array(
            'name'=>'view_count',
            'value'=>'$data->view_count',
        ),
        'title_category'=>array(
            'name'=>'title_category',
            'type' => 'raw',
            'value'=> 'isset($data->category) ? CHtml::link($data->category->title, array("category/index", "Category[id]"=>$data->id_category)) : ""',
        ),
        'title_brand'=>array(
            'name'=>'title_brand',
            'type' => 'raw',
            'value'=> 'isset($data->brand) ? CHtml::link($data->brand->title, array("brand/index", "Brand[id]"=>$data->id_brand)) : ""',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
