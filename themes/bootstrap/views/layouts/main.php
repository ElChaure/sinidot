<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/validaciones.js"></script>
</head>

<body>

<?php //$_SESSION['intentos'] = 0; ?>

 <!-- Inicio Header -->
    
      <div class="logo">
         <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner.png" width="1125" height="100" />
      </div>
    
  <!-- Fin Header -->

<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
		'type'=>'null', // null or 'inverse'
		'brand'=>'',
		'brandUrl'=>'',
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
		array(
		'class'=>'bootstrap.widgets.TbMenu',
		'items'=>array(
		array('label'=>'Inicio','icon'=>'home', 'url'=>array('/site/index')),
		array('label'=>'Catalogos','icon'=>'list', 'url'=>'#',
		'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin_mpps'),		
		'items'=>array(
		    array('label'=>'Tablas Maestras'),
			array('label'=>'Grupos Sanguineos','icon'=>'tint', 'url'=>array('/sangre/admin')),
			array('label'=>'Tipos de Trasplantes','icon'=>'icon-heart', 'url'=>array('/tipos_trasplantes/admin')),
			array('label'=>'Tipos de Donantes','icon'=>'icon-star-empty', 'url'=>array('/tipos_donantes/admin')),
			array('label'=>'Tipos de Dialisis','icon'=>'icon-random', 'url'=>array('/tipos_dialisis/admin')),
			array('label'=>'Estados','icon'=>'icon-map-marker', 'url'=>array('/estados/admin')),
			array('label'=>'Municipios','icon'=>'icon-map-marker','url'=>array('/municipios/admin')),
			array('label'=>'Parroquias','icon'=>'icon-map-marker', 'url'=>array('/parroquias/admin')),			
			array('label'=>'Centros Asistenciales'),
			array('label'=>'Centros Hospitalarios','icon'=>'icon-plus', 'url'=>array('/centros_hospitalarios/admin')),
			array('label'=>'Tipos de Centros Hospitalarios','icon'=>'icon-plus-sign', 'url'=>array('/tipos_centros/admin')),
			array('label'=>'Personal'),
			array('label'=>'Personal','icon'=>'icon-user', 'url'=>array('/personal/admin')),
			array('label'=>'Estatus de Personal','icon'=>'icon-ok-sign', 'url'=>array('/estatus_per/admin')),
			array('label'=>'Cargos','icon'=>'icon-star-empty', 'url'=>array('/cargos/admin')),
			array('label'=>'Usuarios del Sistema'),
			array('label'=>'Administrar Usuarios','icon'=>'icon-user', 'url'=>Yii::app()->user->ui->userManagementAdminUrl, 'visible'=>!Yii::app()->user->isGuest),
			)),
		array('label'=>'Pacientes','icon'=>'user', 'url'=>'#', 
		'visible'=>!Yii::app()->user->isGuest,
		'items'=>array(
		array('label'=>'Condicion de Pacientes','icon'=>'icon-ok', 'url'=>array('/condicion_paciente/admin'),'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin_mpps')),
		array('label'=>'Estatus de Pacientes','icon'=>'icon-ok-sign', 'url'=>array('/estatus_pac/admin'),'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin_mpps')),		
		//array('label'=>'Trasplante'),
		//array('label'=>'Corazon', 'url'=>'#'),
		//array('label'=>'Higado', 'url'=>'#'),
		//array('label'=>'Riñon', 'url'=>array('/pacientes/admin')),
		array('label'=>'Pacientes','icon'=>'icon-user', 'url'=>array('/pacientes/admin')),
		//array('label'=>'Tejido'),
		//array('label'=>'Cornea', 'url'=>'#'),
		//array('label'=>'Valvulas Cardiacas', 'url'=>'#'),
		//array('label'=>'Celulas Progenitoras Hematopoyeticas', 'url'=>'#'),
		array('label'=>'Histocompatibilidad',
                      'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin_mpps'),
                ),
			array('label'=>'HLA A','icon'=>'icon-filter', 'url'=>array('/hla_a/admin'),'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin_mpps')),
			array('label'=>'HLA B','icon'=>'icon-filter', 'url'=>array('/hla_b/admin'),'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin_mpps')),
			array('label'=>'HLA DR','icon'=>'icon-filter', 'url'=>array('/hla_dr/admin'),'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin_mpps')),		
		)),
		array('label'=>'Donantes','icon'=>'user', 'url'=>'#', 
		'visible'=>!Yii::app()->user->isGuest,
		'items'=>array(
                array('label'=>'Estatus de Donantes','icon'=>'icon-ok-sign', 'url'=>array('/estatus_don/admin'),'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin_mpps')),
		array('label'=>'Registro de Donantes','icon'=>'icon-user', 'url'=>array('/donantes/admin')),
		)),
		array('label'=>Yii::app()->user->name, 'url'=>'#','visible'=>!Yii::app()->user->isGuest, 'items'=>array(
              array('label'=>'Perfil', 'icon'=>'user', 'url'=>array('/site/perfil')),
              array('label'=>'Cerrar Sesión', 'icon'=>'home', 'url'=>array('cruge/ui/logout')),
        ))
		//array('label'=>'Entrar', 'url'=>Yii::app()->user->ui->loginUrl, 'visible'=>Yii::app()->user->isGuest),
		//array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>Yii::app()->user->ui->logoutUrl, 'visible'=>!Yii::app()->user->isGuest)
		
		

		),
		),
		),
		)); ?>
</div>
    </div>
	</div>
</div>
<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
<section class="footer-credits">
    <div class="container">
	        <div id="titfoot" align="CENTER">
            <b>Ministerio del Poder Popular para la Salud<br/>
            <i>Oficina de Tecnolog&iacute;as de Informaci&oacute;n y Comunicaci&oacute;n  - <?php echo date('Y'); ?></i></b>
			</div>
    </div>
	<div id="footer">
		
        
	</div><!-- footer -->

</div><!-- page -->
<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
</body>
</html>
