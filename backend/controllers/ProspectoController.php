<?php

class ProspectoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        private $user_id, $organizacion_id, $is_superadmin, $is_ejecutivo, $is_supervisor;

        public function init()
        {
            $this->user_id = Yii::app()->user->id;
            $this->organizacion_id = Yii::app()->user->data()->organizacion_id;
            $this->is_superadmin = Yii::app()->user->hasRole("superadmin");
            $this->is_ejecutivo = Yii::app()->user->hasRole("ejecutivo");
            $this->is_supervisor = Yii::app()->user->hasRole("supervisor");
            
        }
        
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
			
                    
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
                                'actions'=>array('index','view','create','update','admin'),
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
		$model=new Prospecto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $tipoequipos = Tipoequipo::model()->findAll();
                $estados = Estado::model()->findAll();
                
                              
              
		if(isset($_POST['Prospecto']))
		{
			$model->attributes=$_POST['Prospecto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'tipoequipos'=>$tipoequipos,
                        'estados'=>$estados,
                        'user_id' =>  $this->user_id,
                        'organizacion_id' => $this->organizacion_id,
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

                $tipoequipos = Tipoequipo::model()->findAll();
                $estados = Estado::model()->findAll();
              
                
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prospecto']))
		{
			$model->attributes=$_POST['Prospecto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
                        'tipoequipos'=>$tipoequipos,
                        'estados'=>$estados,
                        'user_id' =>  $this->user_id,
                        'organizacion_id' => $this->organizacion_id,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
             
                $model =  $this->loadModel($id);
               
                $allow = false;
                
                if($this->is_superadmin) $allow = true;
                if($this->is_supervisor && $model->organizacion_id == $this->organizacion_id) $allow = true;
                if($this->is_ejecutivo && $model->user_id == $this->user_id ) $allow = true;
            
                if($allow) { $this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                
                } else {
                    
                        throw new CHttpException(401,'Lo sentimos, no tiene permisos para ejecutar esta acción.');
                }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
               
                //si el usuario es super administrador, puede ver todos los prospectos
                //si el usuario es supervisor, sólo puede ver prospectos de la organización a la que pertenece
                //si el usuario es ejecutivo, sólo puede ver sus propios prospectos
                    
                if($this->is_superadmin) $criteria = array();
                if($this->is_supervisor) $criteria = array('condition'=>'organizacion_id = '.$this->organizacion_id);
                if($this->is_ejecutivo) $criteria = array('condition'=>'user_id = '.$this->user_id);
            
		$dataProvider=new CActiveDataProvider('Prospecto',
                        array(
                            'criteria'=>$criteria,
                            'pagination'=>array(
                                'pageSize'=>20,
                            ),
                        )
                );
                
                
                
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prospecto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prospecto']))
			$model->attributes=$_GET['Prospecto'];

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
		$model=Prospecto::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='prospecto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
