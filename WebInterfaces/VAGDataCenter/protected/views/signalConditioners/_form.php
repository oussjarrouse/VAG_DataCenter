<?php
/* @var $this SignalConditionersController */
/* @var $model SignalConditioners */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signal-conditioners-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descriptions'); ?>
		<?php echo $form->textField($model,'descriptions',array('size'=>256,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'descriptions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Company_idCompany'); ?>
		<?php echo $form->textField($model,'Company_idCompany',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Company_idCompany'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->