<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Изменение новости',
);

$this->menu=array(
    array('label'=>'Управление новостями', 'url'=>array('index')),
    array('label'=>'Просмотреть данную новость', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Создать новую новость', 'url'=>array('create')),
    array('label'=>'Удалить данную новость', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены что хотите удалить данную новость?')),
);
?>

<h1>Изменить новость <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>