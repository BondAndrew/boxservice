<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
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

    <div>
        <?php echo $form->labelEx($model,'image'); ?>
        <?php echo $this->post_image($model->title, $model->img, '150','small_img');?>
        <br>
        <?php if(!empty($model->img) && file_exists(Yii::getPathOfAlias("webroot.images.news").DIRECTORY_SEPARATOR.$model->img)) :?>
            <label for="News_del_img">Удалить фото</label>
            <?echo CHtml::checkBox('del_img', false);?>
            <label for="News_image">Изменить фото</label>
        <?else:?>
            <label for="News_image">Добавить фото</label>
        <?endif;?>
        <?php echo CHtml::activeFileField($model, 'image'); ?>
        <br />
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_category'); ?>
        <?php echo $form->dropDownList($model,'id_category', $model->dop_inf['category']); ?>
        <?php echo $form->error($model,'id_category'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_brand'); ?>
        <?php echo $form->dropDownList($model,'id_brand', $model->dop_inf['brand']); ?>
        <?php echo $form->error($model,'id_brand'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->