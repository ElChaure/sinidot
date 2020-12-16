<?php
$this->breadcrumbs=array(
	'Tbl Email Queues'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'Listar Tbl_email_queue','url'=>array('index')),
	array('label'=>'Crear Tbl_email_queue','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-email-queue-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Tbl Email Queues</h1>

<p>
Opcionalmente puede usar un operador de comparaciòn (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de bùsqueda para especificar còmo se debe hacer la comparaciòn. .
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tbl-email-queue-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'from_name',
		'from_email',
		'to_email',
		'subject',
		'message',
		/*
		'max_attempts',
		'attempts',
		'success',
		'date_published',
		'last_attempt',
		'date_sent',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
