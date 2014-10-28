<?php
/* @var $this ServiceCenterController */
/* @var $model ServiceCenter */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-center-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> необходимо обязательно заполнять.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_officially'); ?>
		<?php echo $form->textField($model,'email_officially',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'email_officially'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_city'); ?>
		<?php echo $form->textField($model,'id_city'); ?>
		<?php echo $form->error($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>511)); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coordinates'); ?>
		<?php echo $form->textField($model,'coordinates'); ?>
		<?php echo $form->error($model,'coordinates'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'working_hours'); ?>
		<?php echo $form->textField($model,'working_hours',array('size'=>60,'maxlength'=>1023)); ?>
		<?php echo $form->error($model,'working_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dop_info'); ?>
		<?php echo $form->textArea($model,'dop_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'dop_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site'); ?>
		<?php echo $form->textField($model,'site',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transliteration'); ?>
		<?php echo $form->textField($model,'transliteration',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'transliteration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'personal_questions'); ?>
		<?php echo $form->textField($model,'personal_questions'); ?>
		<?php echo $form->error($model,'personal_questions'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->