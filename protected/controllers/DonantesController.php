<?php

class DonantesController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','buscapersona','admin_activos','view_cross','asignacion'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionCreate()
	{
		$model=new Donantes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Donantes']))
		{
			$model->attributes=$_POST['Donantes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->donante_id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Donantes']))
		{
			$model->attributes=$_POST['Donantes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->donante_id));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Donantes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Donantes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Donantes']))
			$model->attributes=$_GET['Donantes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Donantes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='donantes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionBuscapersona()
	{
                
            
            if (Yii::app()->request->isAjaxRequest)
                {
		    $nac = Yii::app()->request->getParam( 'nac' );
                    $ced = Yii::app()->request->getParam( 'ced' );
		    if (($nac != '') || ($ced != ''))
                    {
			 $persona = Donantes::model()->findByAttributes(array('cedula'=>$ced, 'nacionalidad'=>$nac));
		         if ($persona != null){
		            $datos['donde'] = 3;
		            echo json_encode($datos);
		            exit;
		           } 
                           $tabla = ($nac == 'V') ? 'datos_personas_v' : 'datos_personas_e';
			   $data = Yii::app()->db2->createCommand()->from($tabla)->where('"NUMCEDULA" = '.$ced)->queryRow();
                          if (!$data){
		              echo json_encode($datos['donde'] = 0);
		              exit;
		            }

			$data["FECHANAC"] = str_replace('/', '-', $data["FECHANAC"]);
                        echo CJSON::encode($data);
                        Yii::app()->end();
                        }

                }
        }

	public function actionAdmin_activos()
	{
		$model=new Donantes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Donantes']))
			$model->attributes=$_GET['Donantes'];
		$this->render('admin_activos',array(
			'model'=>$model,
		));
		
		
		
	}

	public function actionView_cross($id)
	{
		$this->render('view_cross',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionAsignacion()
	{
		//var_dump($_POST);
                //die();
                $organo1=$_POST['organo1'];
		$organo2=$_POST['organo2'];
		$paciente1=$_POST['paciente1'];
		$paciente2=$_POST['paciente2'];
                $hora=date("G");
                $asig1=Organos::model()->findByPk($organo1);
                $don=$asig1->donante_id; 
                $asig1->paciente_id=$paciente1;
                $asig1->hora_asignacion=$hora;
                $asig1->estatus_id=2;   
                $asig1->save();

                $asig2=Organos::model()->findByPk($organo2);
                $don=$asig2->donante_id; 
                $asig2->paciente_id=$paciente2;
                $asig2->hora_asignacion=$hora;
                $asig2->estatus_id=2;   
                $asig2->save();

               $pac1=Pacientes::model()->findByPk($paciente1);
		Yii::app()->db->createCommand("
		insert into tbl_email_queue(
		   from_name,
		   from_email,
		   to_email,
		   subject,
		   message,
		   max_attempts,
		   attempts,
		   success,
		   date_published,
		   last_attempt,
		   date_sent) values (
		   'Coord. Instituto de Inmunologia',
		   'coord_idi@ucv.edu.ve',
		    '".$pac1->correo_electronico."',
		   'Asignacion de Riñon',
		   'Saludos cordiales, se le informa que ha sido seleccionado para recibir un trasplante, comuniquese con su Coordinador Hospitalario',
		   3,
		   1,
		   0,
		  '".date('Y/m/d')."',
		  '".date('Y/m/d')."',
		  '".date('Y/m/d')."'
		   )
		")->query();

               $pac2=Pacientes::model()->findByPk($paciente2);
		Yii::app()->db->createCommand("
		insert into tbl_email_queue(
		   from_name,
		   from_email,
		   to_email,
		   subject,
		   message,
		   max_attempts,
		   attempts,
		   success,
		   date_published,
		   last_attempt,
		   date_sent) values (
		   'Coord. Instituto de Inmunologia',
		   'coord_idi@ucv.edu.ve',
		    '".$pac2->correo_electronico."',
		   'Asignacion de Riñon',
		   'Saludos cordiales, se le informa que ha sido seleccionado para recibir un trasplante, comuniquese con su Coordinador Hospitalario',
		   3,
		   1,
		   0,
		  '".date('Y/m/d')."',
		  '".date('Y/m/d')."',
		  '".date('Y/m/d')."'
		   )
		")->query();

                $dona=Donantes::model()->findByPk($don);
                $dona->estatus_id=2;   
                $dona->save();                
 
		
                $model=new Donantes('search');
 		$model->unsetAttributes();  // clear any default values
                $this->render('admin',array(
			'model'=>$model,
		));
		
	}

}
