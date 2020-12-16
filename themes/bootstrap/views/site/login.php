<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
/*
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
*/
?>

<div id="ingreso" backgound_color='#bbbbbb' align='center'>
    <h1>Sistema Nacional de Información Sobre Donación y Trasplante</h1>     

</br>	  
<h1>Ingreso al Sistema</h1>

<h2><p>Por favor ingrese sus credenciales de usuario:</p></h2>
<br>
<br>
</div>
<div class="caja1">
<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password'); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Iniciar Sesión',
        )); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
