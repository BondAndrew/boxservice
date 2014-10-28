<?php
/* @var $this BrandController */
/* @var $model Brand */
/* @var $form CActiveForm */
?>
<?php
Yii::app()->getClientScript()->registerPackage('li_Translit');
Yii::app()->clientScript->registerScript('transliteration',
    "$(function(){
        $('#Brand_title').liTranslit({
            elAlias:$('#Brand_transliteration')
        });
    });",0);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'brand-form',
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
		<?php echo $form->labelEx($model,'transliteration'); ?>
		<?php echo $form->textField($model,'transliteration',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'transliteration'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->