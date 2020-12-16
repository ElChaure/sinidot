<?php
$this->breadcrumbs=array(
	'Hla Donantes'=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>'Listar Hla_donante','url'=>array('index')),
	//array('label'=>'Gestionar Hla_donante','url'=>array('admin')),
        array('label'=>'Regresar','url'=>array('donantes/admin')),
);
?>

<h1>Crear HLA de Donante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
