<?php
$this->breadcrumbs=array(
	'Hla Pacientes'=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>'Listar Hla_paciente','url'=>array('index')),
	//array('label'=>'Gestionar Hla_paciente','url'=>array('admin')),
        array('label'=>'Regresar','url'=>array('pacientes/admin')),
);
?>

<h1>Crear HLA de Paciente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
