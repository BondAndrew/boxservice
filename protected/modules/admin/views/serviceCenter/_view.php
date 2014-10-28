<?php
/* @var $this ServiceCenterController */
/* @var $data ServiceCenter */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_center')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_center), array('view', 'id'=>$data->id_center)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_officially')); ?>:</b>
	<?php echo CHtml::encode($data->email_officially); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone')); ?>:</b>
	<?php echo CHtml::encode($data->telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_city')); ?>:</b>
	<?php echo CHtml::encode($data->id_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b>
	<?php echo CHtml::encode($data->street); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('coordinates')); ?>:</b>
	<?php echo CHtml::encode($data->coordinates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('working_hours')); ?>:</b>
	<?php echo CHtml::encode($data->working_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_category_service')); ?>:</b>
	<?php echo CHtml::encode($data->id_category_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dop_service')); ?>:</b>
	<?php echo CHtml::encode($data->id_dop_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_brand_service')); ?>:</b>
	<?php echo CHtml::encode($data->id_brand_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dop_info')); ?>:</b>
	<?php echo CHtml::encode($data->dop_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site')); ?>:</b>
	<?php echo CHtml::encode($data->site); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transliteration')); ?>:</b>
	<?php echo CHtml::encode($data->transliteration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personal_questions')); ?>:</b>
	<?php echo CHtml::encode($data->personal_questions); ?>
	<br />

	*/ ?>

</div>