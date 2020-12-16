<?php
class PacientesController extends Controller
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
                         array('CrugeAccessControlFilter')
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
				'actions'=>array('create','update','admin','delete','buscapersona','selectmunicipio', 'selectparroquia','admin_activos','admin_cruces'),
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
		$model=new Pacientes;
        $tipopac=$_GET['t'];
		if ($tipopac==1){
		   $model->estatus_id=1;
		}
		else
		{
		   $model->estatus_id=6;
		   $model->puntaje=99;
		   
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pacientes']))
		{
			//$model->puntaje=Puntos::calcula($model->paciente_id,$model->porcentaje_par);
			$model->attributes=$_POST['Pacientes'];
            
			if($model->save())
			    if ($tipopac==1){
			       $pac=Pacientes::model()->findByPk($model->paciente_id);
                               $pac->puntaje=Puntos::calcula($pac->paciente_id,$pac->porcentaje_par);
                               $pac->save();
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
   'Coord. Hospitalario de Trasplante',
   'trasplante@mpps.gob.ve',
    '".$model->correo_electronico."',
   'Ingreso a la Lista de Espera',
   'Saludos cordiales, se le informa que ha sido admitido en la Lista de Espera para Trasplante Renal',
   3,
   1,
   0,
  '".date('Y/m/d')."',
  '".date('Y/m/d')."',
  '".date('Y/m/d')."'
   )
")->query();
                        }
                        				
			$this->redirect(array('view','id'=>$model->paciente_id));
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

		if(isset($_POST['Pacientes']))
		{
			$model->attributes=$_POST['Pacientes'];
                        $model->puntaje=Puntos::calcula($model->paciente_id,$model->porcentaje_par);
			if($model->save())
				$this->redirect(array('view','id'=>$model->paciente_id));
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
		$dataProvider=new CActiveDataProvider('Pacientes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pacientes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pacientes']))
			$model->attributes=$_GET['Pacientes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionAdmin_activos()
	{
		$model=new Pacientes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pacientes']))
			$model->attributes=$_GET['Pacientes'];
		/*	
		$Criteria = new CDbCriteria();
		$Criteria->condition = "estatus_id=2";
		$Criteria->condition = "puntaje >0";
		$Criteria->order = "puntaje DESC";
		$model = Pacientes::model()->findAll($Criteria);*/	
		$this->render('admin_activos',array(
			'model'=>$model,
		));
		
		
		
	}
	
		public function actionAdmin_cruces()
	{
		
		
		$this->render('admin_cruces');
		
		
		
	}
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Pacientes::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pacientes-form')
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

                    $persona = Pacientes::model()->findByAttributes(array('cedula'=>$ced, 'nacionalidad'=>$nac));
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

	public function actionSelectmunicipio()
	{
		$id_uno = $_POST['Pacientes']['estado_id'];
		$data=Municipios::model()->findAllBySql(
		"select * from municipios where estado_id
         =:keyword order by municipio_id desc",
         array(':keyword'=>$_POST['Pacientes']['estado_id']));
        $data=CHtml::listData($data,'municipio_id','municipio');
		foreach($data as $value=>$name)
		{
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		}
	}	
	public function actionSelectparroquia()
	{
		$id_uno = $_POST['Pacientes']['municipio_id'];
		$data=Parroquias::model()->findAllBySql(
		"select * from parroquias where municipio_id
         =:keyword order by parroquia_id desc",
         array(':keyword'=>$_POST['Pacientes']['municipio_id']));
        $data=CHtml::listData($data,'parroquia_id','parroquia');
		foreach($data as $value=>$name)
		{
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		}
	}

}
