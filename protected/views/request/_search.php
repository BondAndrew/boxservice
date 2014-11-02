<?php
/* @var $this RequestController */
/* @var $model Request */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_category'); ?>
		<?php echo $form->textField($model,'id_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_brand'); ?>
		<?php echo $form->textField($model,'id_brand'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_city'); ?>
		<?php echo $form->textField($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_close_request'); ?>
		<?php echo $form->textField($model,'time_close_request'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valuations'); ?>
		<?php echo $form->textField($model,'valuations'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assessment_working_time'); ?>
		<?php echo $form->textField($model,'assessment_working_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_check'); ?>
		<?php echo $form->textField($model,'admin_check'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->