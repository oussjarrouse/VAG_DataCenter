<?php

class PatientsSecretController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			//*/
			array('allow', // allow authenticated user to view
				'actions'=>array('index', 'view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin', 'create', 'update' and 'delete' actions
				'actions'=>array('admin','delete', 'create','update'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($md5='')
	{
		$model=new PatientsSecret;
		$model->md5=$md5;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['PatientsSecret']))
		{
			$model->attributes=$_POST['PatientsSecret'];
			$string = $model->firstname . $model->lastname . date('Ymd',strtotime($model->birthdate));
			//echo $string; echo " ";
			$model->md5= md5($string);
			//echo $model->md5;
			//return;
			//if()
			//check if the record already exists
			//$patient = Patients::model()->findByAttributes(array('md5hash'=>$model->md5));
			$patient = Patients::model()->findByMD5Hash($model->md5);
			if(!empty($patient))
			{
				//echo $patient->idPatients;
				$this->redirect(array('view','id'=>$model->idPatientsSecret));
			}
			$transaction = $model->dbConnection->beginTransaction();
			try
			{
				if(!$model->save())
					throw new CException('Sodel save failed.');	
				$patient = new Patients;
				$patient->idPatients = $model->idPatientsSecret;
				$patient->md5hash = $model->md5;
				$patient->birthdate = $model->birthdate;
				$patient->gender = $model->gender;
				if(!$patient->save())
					throw new CException('Save failed');
				$transaction->commit();
				$this->redirect(array('view','id'=>$model->idPatientsSecret));
			}
			catch (CException $e)
			{
				$transaction->rollback();
				Yii::app()->user->setFlash('error.save.failed',$e->getMessage());
			}
		} 

		$this->render('create',array(
			'model'=>$model,'md5'=>$md5,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['PatientsSecret']))
		{
			$model->attributes=$_POST['PatientsSecret'];
			$model->md5= md5($model->firstname . $model->lastname . date('Ymd',strtotime($model->birthdate)));
			//Must change consiqutive saves into a Transaction
			$transaction = $model->dbConnection->beginTransaction();
			try
			{
				if(!$model->save())
					throw new CException('PatientsSecret model save failed');	
				$patient = Patients::model()->findByPk($id);
				$patient->md5hash = $model->md5;
				$patient->birthdate = $model->birthdate;
				$patient->gender = $model->gender;
				if(!$patient->save())
					throw new CException('Patients model save failed');
				$transaction->commit();
				$this->redirect(array('view','id'=>$model->idPatientsSecret));
			}
			catch (CException $e)
			{
				echo $e->getMessage();
				$transaction->rollback();
			}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			//delete patientsecret
			PatientsSecret::model()->findByPk($id)->delete();
			
			//delete patient
			Patients::model()->findByPk($id)->delete();
			$transaction->commit();
		}
		catch(CException $e)
		{
			echo $e->getMessage();
			$transaction->rollback();
		}
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PatientsSecret');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PatientsSecret('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PatientsSecret']))
			$model->attributes=$_GET['PatientsSecret'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PatientsSecret the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PatientsSecret::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PatientsSecret $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='patients-secret-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
