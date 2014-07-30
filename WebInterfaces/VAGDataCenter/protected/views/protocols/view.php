<?php
/* @var $this ProtocolsController */
/* @var $model Protocols */

$this->breadcrumbs=array(
	'Protocols'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List All Protocols', 'url'=>array('index')),
	array('label'=>'Add New Protocol', 'url'=>array('create')),
	array('label'=>'Update This Protocol', 'url'=>array('update', 'id'=>$model->idProtocols)),
	array('label'=>'Delete This Protocol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idProtocols),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Protocols', 'url'=>array('admin')),
);
?>

<h1>View Protocol #<?php echo $model->idProtocols; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProtocols',
		'name',
		'descriptions',
	),
)); ?>
