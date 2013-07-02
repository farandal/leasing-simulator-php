<?
class ProspectoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        private $user_id, $organizacion_id, $is_superadmin, $is_ejecutivo,$is_comision_admin,$is_tasa_admin, $is_supervisor,$monedas,$tasas;

        public function init()
        {
            $this->user_id = Yii::app()->user->id;
            $this->organizacion_id = Yii::app()->user->data()->organizacion_id;
            $this->is_superadmin = Yii::app()->user->hasRole("superadmin");
            $this->is_ejecutivo = Yii::app()->user->hasRole("ejecutivo");
            $this->is_supervisor = Yii::app()->user->hasRole("supervisor");
            $this->is_tasa_admin = Yii::app()->user->hasRole("tasa_admin");
            $this->is_comision_admin = Yii::app()->user->hasRole("comision_admin");
            
            $this->monedas = Calculos::actualizarMonedas();
            
            $this->tasas = Calculos::getTasas();
            
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
                $monedas = Moneda::model()->findAll();
                
		if(isset($_POST['Prospecto']))
		{
			$model->attributes=$_POST['Prospecto'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'tipoequipos'=>$tipoequipos,
                        'estados'=>$estados,
                        'monedas'=>$monedas,
                        'user_id' =>  $this->user_id,
                        'organizacion_id' => $this->organizacion_id,
                        'is_tasa_admin' => $this->is_tasa_admin,
                        'is_comision_admin' => $this->is_comision_admin,
                        'tasas' => $this->tasas,
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
                 $monedas = Moneda::model()->findAll();
                
                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                    
               $calculos = array();
                
		if(isset($_POST['Prospecto']))
		{
			$model->attributes=$_POST['Prospecto'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		} elseif (isset($_POST['sim_prospecto_id'])) {
                    
                        //Verificar permisos
                        $allow = false;

                        if($this->is_superadmin) $allow = true;
                        if($this->is_supervisor && $model->organizacion_id == $this->organizacion_id) $allow = true;
                        if($this->is_ejecutivo && $model->user_id == $this->user_id ) $allow = true;

                        
                        if($allow) {
                            
                            $model=$this->loadModel($_POST['sim_prospecto_id']);
                            
                            list($monto1,$pie1,$m1,$c1,$log1) = Calculos::generarCalculo($_POST['sim_prospecto_id'],intval($model->co_plazo));
                            list($monto2,$pie2,$m2,$c2,$log2) = Calculos::generarCalculo($_POST['sim_prospecto_id'],intval($model->co_plazo2));
                            list($monto3,$pie3,$m3,$c3,$log3) = Calculos::generarCalculo($_POST['sim_prospecto_id'],intval($model->co_plazo3));
                           
                            //Generar calculos de simulación
                            $simulacion = new Simulacion;
                            
                            //Monto a financiar y pie
                            $simulacion->prospecto_id = $_POST['sim_prospecto_id'];
							$simulacion->prospecto = serialize($model);                            
                            $simulacion->monto = $monto1;
                            $simulacion->monto2 = $monto2;
                            $simulacion->monto3 = $monto3;
                            $simulacion->pie = $pie1;
                           
                            //plazos cuotas
                            $simulacion->c1 = $c1;
                            $simulacion->c2 = $c2;
                            $simulacion->c3 = $c3;
                            
                            //Monto cuota
                            $simulacion->m1 = $m1;
                            $simulacion->m2 = $m2;
                            $simulacion->m3 = $m3;
                            
                            $simulacion->log1 = $log1;
                            $simulacion->log2 = $log2;
                            $simulacion->log3 = $log3;
                            
                            $simulacion->moneda = $model->coMoneda->nombre;
                            //Guardar modelo de simulación
                            $simulacion->save();
                            
                            //Redirigir al usuario a la página del prospecto

							$usuario_creador=YumUser::model()->find('id=:id', array(':id'=>$model->user_id));

                            $br = "</br>";
                            $body = $usuario_creador->profile->firstname." ".$usuario_creador->profile->lastname." Ha creado una nueva simulación ".$br.$br;
			    			$body .= " Detalles: ".$br;
							$body .= "<a href=\"http://rightwayleasing.cl/simulacion/".$simulacion->id."\"> Ver en página web</a>".$br.$br;
							$detalles = $this->renderPartial('/prospecto/_detalle',array("model"=>$model),true);
							$body .= $detalles; 
						    $html2pdf = Yii::app()->ePdf->HTML2PDF();
            	        	$html2pdf->WriteHTML($this->renderPartial('/simulacion/_formulario',array("data"=>$simulacion,"ispdf"=>true,"superadmin"=>false),true));
                            Yii::import('common.extensions.yiimail.YiiMailMessage');
                            $message = new YiiMailMessage;
                            $message->setBody($body, 'text/html');
                            $message->subject = 'RightWay - Cotización Nº '.$_POST['sim_prospecto_id']."-".$simulacion->id;
                            $message->addTo(Yii::app()->params['adminEmail']);
			    
							//OBTENER CORREOS DE SUPERADMINS
							$organizacion_prospecto=Organizacion::model()->find('id=:id', array(':id'=>$model->organizacion_id));
							$usuarios_supervisores = YumUser::model()->findAll('organizacion_id=:organizacion_id',array(':organizacion_id'=>$model->organizacion_id));

							$usuarios_administradores = YumUser::model()->findAll();

							foreach($usuarios_supervisores as $usuario) {
								if($usuario->hasRole("supervisor")) $message->addBCC($usuario->profile->email);							
							}
							
							foreach($usuarios_administradores as $usuario) {
								if($usuario->hasRole("superadmin")) $message->addBCC($usuario->profile->email);
							}
							
							
							$message->addBCC($usuario_creador->profile->email);
                            $message->from = Yii::app()->params['adminEmail'];

 									
							$cotizacion_file = '/home/rwaycl/cotizaciones/rightway_cotizacion_'.$id.'.pdf';
							$adicional_file = '/home/rwaycl/rightway/frontend/www/files/ANTECEDENTESREQUERIDOSRIGHTWAYLEASING.pdf';
					
							$html2pdf->Output($cotizacion_file, 'F');
							
							$oPdftk = Yii::app()->ePdf->PDFTK();
				    		$oPdftk ->setInputFile(array("filename" => $cotizacion_file))
                            		->setInputFile(array("filename" => $adicional_file));
				
				
							$final_pdf = $oPdftk->_renderPdf();
					
					
							$file = Swift_Attachment::newInstance( $final_pdf , "rightway_cotizacion_".$id.".pdf");
                    		$message->attach($file);
					
                            Yii::app()->mail->send($message);
							
							//Enviar copia del pdf a ejecutivo rightway con tasas
							if($usuario->profile->ejecutivorwl!="") {
								
								$ejecutivorwl = YumUser::model()->cache(500)->findByPk($usuario->profile->ejecutivorwl);
								$body .= "</br></br><b>Copia ejecutivo Right Way Leasing.</b> </br> El pdf adjunto incluye los datos, valores y tasas con los que se creó esta cotización";
								
								$message = new YiiMailMessage;
								$message->setBody($body, 'text/html');
								$message->subject = 'RightWay - Cotización Nº '.$_POST['sim_prospecto_id']."-".$simulacion->id." [DATA]";
								$message->addTo($ejecutivorwl->profile->email);
								$message->addBCC("farandal@gmail.com");
								$message->from = Yii::app()->params['adminEmail'];	
								
								$html2pdf = Yii::app()->ePdf->HTML2PDF();
								$html2pdf->WriteHTML($this->renderPartial('/simulacion/_formulario',array("data"=>$simulacion,"ispdf"=>true,"superadmin"=>true),true));
								$pdfdatos = $html2pdf->Output("","S");
								
								$file = Swift_Attachment::newInstance( $pdfdatos , "rightway_cotizacion_datos_".$id.".pdf");
								
								$message->attach($file);
								
								Yii::app()->mail->send($message);
							
							}
                            
							
                            $this->redirect(array('update','id'=>$_POST['sim_prospecto_id']));
                            
                            
                        } else {
                             throw new CHttpException(401,'Lo sentimos, no tiene permisos para ejecutar esta acción.');
                        }
                    
                }
                
                
                $criteria=new CDbCriteria;
                $criteria->condition='prospecto_id = :prospecto_id';
                $criteria->params=array(':prospecto_id'=>$model->id);
                $simulaciones_data_provider=new CActiveDataProvider('Simulacion',
                        array(
                            'criteria'=>$criteria,
                            'pagination'=>array(
                                'pageSize'=>20,
                            ),
                        )
                );
                

		$this->render('update',array(
			'model'=>$model,
                        'tipoequipos'=>$tipoequipos,
                        'monedas'=>$monedas,
                        'estados'=>$estados,
                        'user_id' =>  $this->user_id,
                        'organizacion_id' => $this->organizacion_id,
                        'calculos' => $calculos,
                        'tasas' => $this->tasas,
                        'is_tasa_admin' => $this->is_tasa_admin,
                        'is_comision_admin' => $this->is_comision_admin,
                        'simulaciones_data_provider' => $simulaciones_data_provider,
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
