<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'News',
);

$this->menu=array(
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h1>News</h1>
<h2>Новости по категориям:<h2>

<?php $this->renderPartial('/blocks/categories_left', array('categories' => $categories)); ?>

<br/><br/>

<h2>Новости по брендам:<h2>

<?php $this->renderPartial('/blocks/brands_left', array('brands' => $brands)); ?>
ddd
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<script>




    function openDialog(type)
    {
        if(type == 'categories'){
            $('#categoriesDialog').dialog('open');
        } else {
            $('#brandsDialog').dialog('open');
        }
    }
</script>