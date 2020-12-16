<?php
$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	$model->donante_id,
);

$this->menu=array(
	array('label'=>'Regresar','url'=>array('admin')),

);
?>

<h1>Ver Pacientes Compatibles con Donante <?php echo $model->apellido1.' '.$model->nombre1; ?></h1>

<?php

$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM hla_donante WHERE donante_id ='.$model->donante_id)->queryScalar();



$sql='SELECT donante_id as id, 
                fecha_prueba,
                identificacion_prueba,
                hla_donante.locus_a_alelo_1 as id_a,
				hla_a.locus_a_alelo_1 as locus_a_alelo_1,
                hla_donante.locus_b_alelo_1 as id_b,
				hla_b.locus_b_alelo_1 as locus_b_alelo_1,
				hla_donante.locus_dr_alelo_1 as id_dr,
				hla_dr.locus_dr_alelo_1 as locus_dr_alelo_1
		FROM hla_donante
		LEFT JOIN hla_a ON hla_a.locus_a_id=hla_donante.locus_a_alelo_1
		LEFT JOIN hla_b ON hla_b.locus_b_id=hla_donante.locus_b_alelo_1
		LEFT JOIN hla_dr ON hla_dr.locus_dr_id=hla_donante.locus_dr_alelo_1
        WHERE donante_id ='.$model->donante_id;


		
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
        'attributes'=>array(
		     'id', 
             'fecha_prueba', 
			 'locus_a_alelo_1', 
			 'locus_b_alelo_1',
			 'locus_dr_alelo_1',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));

$datos=$dataProvider->getData();
print_r($datos);
die();

$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$dataProvider,
'id'=>'donante-hla-grid',
'columns'=>array(
        'id',
        'fecha_prueba', 
		'locus_a_alelo_1', 
		'locus_b_alelo_1',
		'locus_dr_alelo_1',
),
)); 		 
     
?>
