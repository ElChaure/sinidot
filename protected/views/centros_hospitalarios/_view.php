<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('centro_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->centro_id),array('view','id'=>$data->centro_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
	<?php echo CHtml::encode($data->cedula); ?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_centro_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipoCentro->tipo_centro); ?>
 	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_id')); ?>:</b>
	<?php echo CHtml::encode($data->estado->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('municipio_id')); ?>:</b>
	<?php echo CHtml::encode($data->municipio->municipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parroquia_id')); ?>:</b>
	<?php echo CHtml::encode($data->parroquia->parroquia); ?>
	<br />
        <hr>
        <br />      
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ctx_id')); ?>:</b>
	<?php echo CHtml::encode($data->ctx_id); ?>
	<br />

	*/ ?>

</div>
