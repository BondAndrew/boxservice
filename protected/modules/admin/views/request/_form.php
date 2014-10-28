<?php
/* @var $this RequestController */
/* @var $model Request */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'request-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
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
        <?php echo $form->labelEx($model,'login'); ?>
        <?php echo $form->dropDownList($model,'id_user', $model->dop_inf['user'], array('width' => '60px;')); ?>
        <?php echo $form->error($model,'id_user'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'titleCity'); ?>
        <?php echo $form->dropDownList($model,'id_city', $model->dop_inf['city'], array('width' => '60px;')); ?>
        <?php echo $form->error($model,'id_city'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_close_request'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'Request[time_close_request]',
            'id'=>'Request_time_close_request',
            'language' => 'ru',
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'dd.mm.yy',
                'changeMonth' => 'true',
                'changeYear'=>'true',
                'constrainInput' => 'false',
                'onSelect' => "js:function( selectedDate ) { jQuery('#lastdate').datepicker('option', 'minDate', selectedDate) }",
                'minDate'=>date('d.m.Y',time()),
            ),
            'htmlOptions'=>array(
                'title'=>'Необходимо вводить дату в формате дд.мм.гггг (пример 05.09.2014)',
                'placeholder'=>date('d.m.Y',time()),
                'value'=>date('d.m.Y',time()),
            ),
        ));?>
		<?php echo $form->error($model,'time_close_request'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valuations'); ?>
		<?php echo $form->checkBox($model,'valuations'); ?>
		<?php echo $form->error($model,'valuations'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assessment_working_time'); ?>
		<?php echo $form->checkBox($model,'assessment_working_time'); ?>
		<?php echo $form->error($model,'assessment_working_time'); ?>
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