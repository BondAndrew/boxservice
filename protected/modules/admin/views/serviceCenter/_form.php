<?php
/* @var $this ServiceCenterController */
/* @var $model ServiceCenter */
/* @var $form CActiveForm */


Yii::app()->getClientScript()->registerPackage('li_Translit');
Yii::app()->clientScript->registerScript('transliteration',
    "$(function(){
        $('#ServiceCenter_name').liTranslit({
            elAlias:$('#ServiceCenter_transliteration')
        });
    });",0);
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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'transliteration'); ?>
        <?php echo $form->textField($model,'transliteration',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'transliteration'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'login'); ?>
        <?php echo $form->textField($model,'login',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'login'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'image'); ?>
        <?php echo $this->post_image($model->name, $model->img, '150','small_img');?>
        <br>
        <?php if(!empty($model->img) && file_exists(Yii::getPathOfAlias("webroot.images.serviceCenter").DIRECTORY_SEPARATOR.$model->img)) :?>
            <label for="ServiceCenter_del_img">Удалить фото</label>
            <?echo CHtml::checkBox('del_img', false);?>
            <label for="ServiceCenter_image">Изменить фото</label>
        <?else:?>
            <label for="ServiceCenter_image">Добавить фото</label>
        <?endif;?>
        <?php echo CHtml::activeFileField($model, 'image'); ?>
        <br />
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
		<?php echo $form->labelEx($model,'title_city'); ?>
		<?php echo $form->dropDownList($model,'id_city', $model->dop_array_title['city'], array('style' => 'width: 264px;')); ?>
		<?php echo $form->error($model,'title_city'); ?>
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
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model->user,'username',array('style' => 'width: 256px;','maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'login'); ?>
        <?php echo $form->textField($model->user,'login', array('style' => 'width: 264px;')); ?>
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
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model->user,'email',array('style' => 'width: 256px;','maxlength'=>40)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'send_notification'); ?>
        <?php echo $form->checkBox($model, 'send_notification'); ?>
        <?php echo $form->error($model, 'send_notification'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'personal_questions'); ?>
        <?php echo $form->checkBox($model,'personal_questions'); ?>
        <?php echo $form->error($model,'personal_questions'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'check_user'); ?>
        <?php echo $form->checkBox($model,'check_user'); ?>
        <?php echo $form->error($model,'check_user'); ?>
    </div>

    <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->