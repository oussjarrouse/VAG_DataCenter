<?php
/* @var $this DiagnosisController */
/* @var $model Diagnosis */

$this->breadcrumbs=array(
	'Diagnosises'=>array('index'),
	$model->idDiagnosis=>array('view','id'=>$model->idDiagnosis),
	'Update',
);

$this->menu=array(
	array('label'=>'List All Diagnosis', 'url'=>array('index')),
	array('label'=>'Add This Diagnosis', 'url'=>array('create')),
	array('label'=>'View This Diagnosis', 'url'=>array('view', 'id'=>$model->idDiagnosis)),
	array('label'=>'Manage Diagnosis', 'url'=>array('admin')),
);
?>

<h1>Update Diagnosis <?php echo $model->idDiagnosis; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>