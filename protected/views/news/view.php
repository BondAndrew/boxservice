<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
    'News'=>array('index'),
    $model->title,
);

$this->menu=array(
    array('label'=>'List News', 'url'=>array('index')),
    array('label'=>'Create News', 'url'=>array('create')),
    array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage News', 'url'=>array('admin')),
);
?>


<div id="content">
    <div class="single_item">
        <div class="general_view">

            <div class="view" style="position: relative;">
                <div class="view_content">
                    <div class="item_title">
                        <h3><?=$model->title?></h3>
                    </div>
                    <div class="item_img">
                        <?php echo $this->post_image($model->title, $model->img, '150','small_img');?>
                    </div>
                    <div class="item_review">
                        <div class="item_category">
                            <div class="category_title">
                                <?php echo CHtml::encode($model->category->title); ?>
                            </div>
                            <div class="item_bottom_prnt">
                                <span class="item_time"><?=DateTime::createFromFormat("U", $model->created)->format("H:i")?></span>
                            </div>
                            <div class="item_bottom_prnt">
                                <span class="item_date"><?php echo CHtml::encode(DateTime::createFromFormat("U", $model->created)->format("d-m-Y")); ?></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="item_descr">
                            <?=$model->text?>
                        </div>
                        <div class="bottom_block">
                            <div class="item_category">
                                <div class="category_title">
                                    Просмотров: 1488
                                </div>
                                <div class="item_bottom_prnt">
                                    <span class="item_time"> Комментариев: 1488</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                <div class="view_content">-->
                <!---->
                <!--                    <div class="item_title">-->
                <!--                        <h3>--><?//=$model->title?><!--</h3>-->
                <!--                    </div>-->
                <!--                    <div class="item_img">-->
                <!--                        --><?php //echo $this->post_image($model->title, $model->img, '150','small_img');?>
                <!--                    </div>-->
                <!---->
                <!--                    <div class="item_content">-->
                <!--                        <div class="item_category">-->
                <!--                            <div class="category_title">-->
                <!--                                --><?php //echo CHtml::encode($model->category->title); ?>
                <!--                            </div>-->
                <!--                        </div>-->
                <!---->
                <!--                        <div class="item_descr">-->
                <!--                            --><?php //echo CHtml::encode($model->text); ?>
                <!--                        </div>-->
                <!---->
                <!--                        <div class="item_bottom">-->
                <!--                            <div class="item_bottom_prnt">-->
                <!--                                <span class="item_view_count">99</span>-->
                <!--                            </div>-->
                <!--                            <div class="item_bottom_prnt">-->
                <!--                                <span class="item_time">--><?//=DateTime::createFromFormat("U", $model->created)->format("H:i")?><!--</span>-->
                <!--                            </div>-->
                <!--                            <div class="item_bottom_prnt">-->
                <!--                                <span class="item_date">--><?php //echo CHtml::encode(DateTime::createFromFormat("U", $model->created)->format("d-m-Y")); ?><!--</span>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
</div>

<?php //$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//		'title',
//		'text',
//		'created',
//		'img',
//		'id_category',
//		'id_brand',
//        'view_count'=>array(
//            'name'=>'view_count',
//            'value'=> $model->view_count,
//        ),
//	),
//)); ?>
