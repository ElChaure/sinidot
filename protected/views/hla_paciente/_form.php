<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'hla-paciente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'paciente_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fecha_prueba',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'fecha_prueba'); ?>
	<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha_prueba',
			 'language' => 'es',
			 'options'=>array(
				 'autoSize'=>true,
				 'dateFormat'=>'dd-mm-yy',
				 'selectOtherMonths'=>true,
				 'duration'=>'fast',
				 'showAnim'=>'slide',
				 'showButtonPanel'=>true,
				 'showOtherMonths'=>true,
				 'changeMonth' => 'true',
				 'changeYear' => 'true',
				 ),
	)); ?>

	<?php echo $form->textFieldRow($model,'identificacion_prueba',array('class'=>'span5','maxlength'=>30)); ?>

        <?php //echo $form->textFieldRow($model,'locus_a_alelo_1',array('class'=>'span5','maxlength'=>20)); ?>
	<?php echo $form->dropDownListRow($model, 'locus_a_alelo_1',  CHtml::listData(Hla_a::model()->findAll(), 'locus_a_id', 'locus_a_alelo_1'),
	      array('prompt'=>'Seleccione un Valor'),
	      array('class'=>'span5','maxlength'=>12)
          ); ?>

	
      <?php //echo $form->textFieldRow($model,'locus_b_alelo_1_',array('class'=>'span5','maxlength'=>20)); ?>
      <?php echo $form->dropDownListRow($model, 'locus_b_alelo_1',  CHtml::listData(Hla_b::model()->findAll(), 'locus_b_id', 'locus_b_alelo_1'),
	      array('prompt'=>'Seleccione un Valor'),
	      array('class'=>'span5','maxlength'=>12)
          ); ?>


	<?php //echo $form->textFieldRow($model,'locus_dr_alelo_1',array('class'=>'span5','maxlength'=>20)); ?>
    <?php echo $form->dropDownListRow($model, 'locus_dr_alelo_1',  CHtml::listData(Hla_dr::model()->findAll(), 'locus_dr_id', 'locus_dr_alelo_1'),
	      array('prompt'=>'Seleccione un Valor'),
	      array('class'=>'span5','maxlength'=>12)
          ); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
