<?php
/* @var $this ONNFormController */
/* @var $model ONNForm */

$this->breadcrumbs=array(
	'Onnforms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List All ONN Forms', 'url'=>array('index')),
	array('label'=>'Manage ONN Forms', 'url'=>array('admin')),
);
?>

<h1>Create ONNForm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>