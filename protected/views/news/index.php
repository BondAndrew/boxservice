<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */
/* @var $brands Brand */
/* @var $categories Category */

$this->breadcrumbs=array(
    'News',
);

$this->menu=array(
    array('label'=>'Create News', 'url'=>array('create')),
    array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<div class="news_head">
    <div class="p_title">Новости и анонсы:</div>
    <div class="search decored">
        <input placeholder="Введите заголовок новости или ключевые слова..." type="text"/>
        <a class="btn_orange" href="#">найти</a>
    </div>
</div>
<div class="span-23">
    <div id="content">
        <?php //$this->renderPartial('/blocks/categories_left', array('categories' => $categories)); ?>
        <!---->
        <!--<br/><br/>-->
        <!---->
        <!--<h2>Новости по брендам:<h2>-->
        <!---->
        <?php //$this->renderPartial('/blocks/brands_left', array('brands' => $brands)); ?>

        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
        )); ?>
    </div><!-- content -->
</div>
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