<?php
/* @var $this PatientsSecretController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patients Secrets',
);

	$this->menu=array(
	array('label'=>'Add New Patient', 'url'=>array('create')),
	array('label'=>'Manage Patients', 'url'=>array('admin')),
);
?>

<h1>Patients Secrets</h1>

<?php 
/*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */
$this->widget('zii.widgets..grid.CGridView', array(
		'dataProvider'=>$dataProvider,
		'columns'=>array(
			'idPatientsSecret',
			'firstname',
			'lasttname',
			'birthdate',
			'md5',
			array(
				'class'=>'CButtonColumn',
				'template'=> '{view}'
			),
		),
));
?>
