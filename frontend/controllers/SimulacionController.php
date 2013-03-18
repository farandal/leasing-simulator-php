<?php

class SimulacionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
         private $user_id, $organizacion_id, $is_superadmin, $is_ejecutivo, $is_supervisor;
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
        
        
        
        public function init()
        {
            $this->user_id = Yii::app()->user->id;
            $this->organizacion_id = Yii::app()->user->data()->organizacion_id;
            $this->is_superadmin = Yii::app()->user->hasRole("superadmin");
            $this->is_ejecutivo = Yii::app()->user->hasRole("ejecutivo");
            $this->is_supervisor = Yii::app()->user->hasRole("supervisor");
        
            
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
				'actions'=>array('create','update','delete','pdf','email'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','pdf','email'),
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
                        'superadmin'=>$this->is_superadmin,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
        public function actionPdf($id) {
                $model = $this->loadModel($id);
                # HTML2PDF has very similar syntax
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $html2pdf->WriteHTML($this->renderPartial('_formulario',array("data"=>$model,"ispdf"=>true,"superadmin"=>$this->is_superadmin), true));
                $html2pdf->Output();
                header('Content-Type: application/pdf');
                
        }
        
        
        
        public function actionEmail($id) {
            
            $model = $this->loadModel($id);
            
            if(isset($_POST['email']))
		{
			
                    # HTML2PDF has very similar syntax
                    $html2pdf = Yii::app()->ePdf->HTML2PDF();
                    $html2pdf->WriteHTML($this->renderPartial('_formulario',array("data"=>$model,"ispdf"=>true,"superadmin"=>$this->is_superadmin), true));
                    Yii::import('common.extensions.yiimail.YiiMailMessage');
                    $message = new YiiMailMessage;
                    $message->setBody('RightWay - Cotización Nº '.$id, 'text/html');
                    $file = Swift_Attachment::newInstance($html2pdf->Output("","S"), "rightway_cotizacion_".$id.".pdf");
                    $message->attach($file);
                    $message->subject = 'RightWay - Cotización Nº '.$id;
                    $message->addTo($_POST['email']);
                    $message->from = Yii::app()->params['adminEmail'];
                    Yii::app()->mail->send($message);
                
		}
            

              $this->render('email',array(
			'model'=>$model,
              ));
                
        }
        
        public function actionCreate()
	{
		/*$model=new Simulacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Simulacion']))
		{
			$model->attributes=$_POST['Simulacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));*/
            
                
            
            
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

		if(isset($_POST['Simulacion']))
		{
			$model->attributes=$_POST['Simulacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		
                $simulacion = $this->loadModel($id);
                $this->loadModel($id)->delete();
                
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])) $this->redirect(array('/Prospecto/','id'=>$simulacion->prospecto->id));
			//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Simulacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		/*$model=new Simulacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Simulacion']))
			$model->attributes=$_GET['Simulacion'];

		$this->render('admin',array(
			'model'=>$model,
		));*/
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Simulacion::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='simulacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
