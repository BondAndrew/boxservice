<?php
/* @var $this BanController */
/* @var $model Ban */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ban-form',
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
        <?php $value = isset($_GET['id_user']) && ((int)$_GET['id_user']>0) ? array('value'=>(int)$_GET['id_user']): array();
        if ($model->isNewRecord) {
            if (!empty($value)) {
                echo $form->hiddenField($model,'id_user',$value);
                $value['disabled']='disabled';
                echo $form->textField($model,'view_id_user',$value);
            } else {
                echo $form->textField($model,'id_user');
            }
        } else {
            echo $form->textField($model,'id_user',array('disabled'=>'disabled'));
        }
        ?>
        <?php echo $form->error($model,'id_user'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'finishing'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'Ban[finishing]',
            'id'=>'Ban_finishing',
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
                'placeholder'=>'Бессрочный бан',
            ),
        ));?>
        <?php echo $form->error($model,'finishing'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
