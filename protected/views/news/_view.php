<?php
/* @var $this NewsController */
/* @var $data News */
?>

    <div class="view">
        <div class="view_content">
            <div class="item_img">
                <?php echo $this->post_image($data->title, $data->img, '150','small_img');?>
            </div>

            <div class="item_content">
                <div class="item_title">
                    <h3><?=$data->title?></h3>
                </div>

                <div class="item_category">
                    <div class="category_title">
                        <?php echo CHtml::encode($data->category->title); ?>
                    </div>
                </div>

                <div class="item_descr">
                    <?php echo CHtml::encode($data->text); ?>
                </div>

                <div class="item_bottom">
                    <div class="item_bottom_prnt">
                        <span class="item_view_count">99</span>
                    </div>
                    <div class="set_hr"><hr/></div>
                    <div class="item_bottom_prnt">
                        <span class="item_time"><?=DateTime::createFromFormat("U", $data->created)->format("H:i")?></span>
                    </div>
                    <div class="set_hr"><hr/></div>
                    <div class="item_bottom_prnt">
                        <span class="item_date"><?php echo CHtml::encode(DateTime::createFromFormat("U", $data->created)->format("d-m-Y")); ?></span>
                    </div>
                    <div class="set_hr" style="width: 27%;"><hr/></div>
                    <div style="position: relative; float: left;">
                        <a class="read_more" href="<?= Yii::app()->request->getBaseUrl() . '/news/view/' . $data->id ?>">читать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--        <b>--><?php //echo CHtml::encode($data->getAttributeLabel('id_category')); ?><!--:</b>-->
    <!--        --><?php //echo CHtml::encode($data->id_category); ?>
    <!--        <br />-->
    <!---->
    <!--        <b>:</b>-->
    <!---->
    <!--        --><?php //echo CHtml::encode($data->category->title); ?>
    <!--        <br />-->
    <!---->
    <!--        <b>--><?php //echo CHtml::encode($data->getAttributeLabel('id_brand')); ?><!--:</b>-->
    <!--        --><?php //echo CHtml::encode($data->id_brand); ?>
    <!--        <br />-->

    <!--        --><?php //echo CHtml::encode($data->view_count); ?>