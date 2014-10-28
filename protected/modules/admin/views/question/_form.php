<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля с <span class="required">*</span> необходимо обязательно заполнять.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'text'); ?>
        <?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'text'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'loginOwner'); ?>
        <?php echo $form->dropDownList($model,'id_user', $model->dop_inf['simple_user'], array('width' => '60px;')); ?>
        <?php echo $form->error($model,'id_user'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'loginRecipient'); ?>
        <?php echo $form->dropDownList($model,'question_for_id_user', $model->dop_inf['service'], array('width' => '60px;')); ?>
        <?php echo $form->error($model,'question_for_id_user'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'image'); ?>
        <?php echo $this->post_image($model->title, $model->img, '150','small_img', 'questions');?>
        <br>
        <?php if(!empty($model->img) && file_exists(Yii::getPathOfAlias("webroot.images.questions").DIRECTORY_SEPARATOR.$model->img)) :?>
            <label for="Question_del_img">Удалить фото</label>
            <?echo CHtml::checkBox('del_img', false);?>
            <label for="Question_image">Изменить фото</label>
        <?else:?>
            <label for="Question_image">Добавить фото</label>
        <?endif;?>
        <?php echo CHtml::activeFileField($model, 'image'); ?>
        <br />
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'titleCategory'); ?>
        <?php echo $form->dropDownList($model,'id_category', $model->dop_inf['category']); ?>
        <?php echo $form->error($model,'id_category'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'titleBrand'); ?>
        <?php echo $form->dropDownList($model,'id_brand', $model->dop_inf['brand'], array('width' => '60px;')); ?>
        <?php echo $form->error($model,'id_brand'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'titleCity'); ?>
		<?php echo $form->dropDownList($model,'id_city', $model->dop_inf['city'], array('width' => '60px;')); ?>
		<?php echo $form->error($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_check'); ?>
        <?php echo $form->checkBox($model,'admin_check'); ?>
		<?php echo $form->error($model,'admin_check'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->