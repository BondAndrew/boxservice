<?php
/* @var $this RequestController */
/* @var $data Request */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_brand')); ?>:</b>
	<?php echo CHtml::encode($data->id_brand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_city')); ?>:</b>
	<?php echo CHtml::encode($data->id_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_close_request')); ?>:</b>
	<?php echo CHtml::encode($data->time_close_request); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valuations')); ?>:</b>
	<?php echo CHtml::encode($data->valuations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assessment_working_time')); ?>:</b>
	<?php echo CHtml::encode($data->assessment_working_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_check')); ?>:</b>
	<?php echo CHtml::encode($data->admin_check); ?>
	<br />

	*/ ?>

</div>