<?php
/* @var $this ServiceCenterController */
/* @var $model ServiceCenter */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_center'); ?>
		<?php echo $form->textField($model,'id_center'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_officially'); ?>
		<?php echo $form->textField($model,'email_officially',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_city'); ?>
		<?php echo $form->textField($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>511)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coordinates'); ?>
		<?php echo $form->textField($model,'coordinates'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'working_hours'); ?>
		<?php echo $form->textField($model,'working_hours',array('size'=>60,'maxlength'=>1023)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dop_info'); ?>
		<?php echo $form->textArea($model,'dop_info',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site'); ?>
		<?php echo $form->textField($model,'site',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transliteration'); ?>
		<?php echo $form->textField($model,'transliteration',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'personal_questions'); ?>
		<?php echo $form->textField($model,'personal_questions'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->