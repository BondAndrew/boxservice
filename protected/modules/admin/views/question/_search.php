<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>54)); ?>
	</div>

    <div class="row">
        <?php echo $form->label($model,'loginOwner'); ?>
        <?php echo $form->dropDownList($model,'id_user', $model->dop_inf['simple_user'], array('width' => '60px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'loginRecipient'); ?>
        <?php echo $form->dropDownList($model,'question_for_id_user', $model->dop_inf['service']); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'titleCategory'); ?>
        <?php echo $form->dropDownList($model,'id_category', $model->dop_inf['category']); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titleBrand'); ?>
        <?php echo $form->dropDownList($model,'id_brand', $model->dop_inf['brand'], array('width' => '60px;')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titleCity'); ?>
        <?php echo $form->dropDownList($model,'id_city', $model->dop_inf['city'], array('width' => '60px;')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_check'); ?>
        <?php echo $form->checkBox($model,'admin_check'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->