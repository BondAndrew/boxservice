<?php
/* @var $this ViewsController */
/* @var $model Views */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'views-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> необходимо обязательно заполнять.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_ip'); ?>
		<?php echo $form->textField($model,'user_ip',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'user_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_viewing'); ?>
		<?php echo $form->textField($model,'time_viewing'); ?>
		<?php echo $form->error($model,'time_viewing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_object'); ?>
		<?php echo $form->textField($model,'id_object'); ?>
		<?php echo $form->error($model,'id_object'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_object'); ?>
		<?php echo $form->textField($model,'type_object',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'type_object'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->