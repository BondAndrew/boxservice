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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('style' => 'width: 256px;','maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('style' => 'width: 256px;','maxlength'=>255)); ?>
	</div>

    <div class="row">
        <?php echo $form->label($model,'login'); ?>
        <?php echo $form->dropDownList($model,'id_user', $model->dop_array_title['login_service'], array('style' => 'width: 264px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'title_category'); ?>
        <?php echo $form->dropDownList($model,'title_category', $model->dop_array_title['category'], array('style' => 'width: 264px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'title_brand'); ?>
        <?php echo $form->dropDownList($model,'id_brand', $model->dop_array_title['brand'], array('style' => 'width: 264px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'title_city'); ?>
        <?php echo $form->dropDownList($model,'id_city', $model->dop_array_title['city'], array('style' => 'width: 264px;')); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'email_officially'); ?>
		<?php echo $form->textField($model,'email_officially',array('style' => 'width: 256px;','maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('style' => 'width: 256px;','maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('style' => 'width: 256px;','maxlength'=>255)); ?>
	</div>

    <div class="row">
		<?php echo $form->label($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('style' => 'width: 256px;','maxlength'=>511)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site'); ?>
		<?php echo $form->textField($model,'site',array('style' => 'width: 256px;','maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_notification'); ?>
		<?php echo $form->dropDownList($model, 'send_notification', array(''=>'Все', '1'=>'Да', '0'=>'Нет')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'personal_questions'); ?>
		<?php echo $form->dropDownList($model,'personal_questions', array(''=>'Все', '1'=>'Да', '0'=>'Нет')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_user'); ?>
		<?php echo $form->dropDownList($model,'check_user', array(''=>'Все', '1'=>'Да', '0'=>'Нет')); ?>
	</div>

    <div class="row">
        <?php echo $form->label($model,'img'); ?>
        <?php echo $form->dropDownList($model,'check_user', array(''=>'Все', '1'=>'Да', '0'=>'Нет')); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->