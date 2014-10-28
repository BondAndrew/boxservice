<?php
/* @var $this SubscribeReplyController */
/* @var $model SubscribeReply */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subscribe-reply-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> необходимо обязательно заполнять.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_question'); ?>
		<?php echo $form->textField($model,'id_question'); ?>
		<?php echo $form->error($model,'id_question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_user'); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'email_user'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->