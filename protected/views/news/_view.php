<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">

<!--    --><?//var_dump($data); exit;?>
<!--	--><?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
    <a href="<?=Yii::app()->request->getBaseUrl() . '/news/view/' . $data->id?>"><?=$data->title?></a>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?=DateTime::createFromFormat("U", $data->created)->format("H:i")?> <?php echo CHtml::encode(DateTime::createFromFormat("U", $data->created)->format("d-m-Y")); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('view_count')); ?>:</b>
	<?php echo CHtml::encode($data->view_count); ?>
	<br />

    <div>
<!--        --><?php //echo CHtml::encode($data->getAttributeLabel('img')); ?>
        <?php echo $this->post_image($data->title, $data->img, '150','small_img');?>
    </div>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_category')); ?>:</b>

	<?php echo CHtml::encode($data->category->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_brand')); ?>:</b>
	<?php echo CHtml::encode($data->id_brand); ?>
	<br />

    <a href="<?=Yii::app()->request->getBaseUrl() . '/news/view/' . $data->id?>">ЧИТАТЬ</a>


</div>