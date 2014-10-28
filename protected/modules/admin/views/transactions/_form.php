<?php
/* @var $this TransactionsController */
/* @var $model Transactions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transactions-form',
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
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_system'); ?>
		<?php echo $form->textField($model,'payment_system',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'payment_system'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hash'); ?>
		<?php echo $form->textField($model,'hash',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'hash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_success'); ?>
		<?php echo $form->textField($model,'payment_success'); ?>
		<?php echo $form->error($model,'payment_success'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_problem'); ?>
		<?php echo $form->textField($model,'payment_problem'); ?>
		<?php echo $form->error($model,'payment_problem'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->