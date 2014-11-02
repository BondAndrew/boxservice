<?php
/* @var $this RequestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Requests',
);

$this->menu=array(
	array('label'=>'Create Request', 'url'=>array('create')),
	array('label'=>'Manage Request', 'url'=>array('admin')),
);
?>

<h1>Заявки</h1>
<h2>Заявки по категориям:</h2>
<?php $this->renderPartial('/blocks/categories_left', array('categories' => $categories)); ?>
<br/><br/>
<h2>Заявки по брендам:</h2>
<?php $this->renderPartial('/blocks/brands_left', array('brands' => $brands)); ?>
<?php $this->renderPartial('/request/top_form', array('cities' => $cities, 'categories' => $categories, 'brands' => $brands)); ?>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

