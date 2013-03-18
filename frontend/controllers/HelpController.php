<?
class HelpController extends Controller
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
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
                                'actions'=>array('index'),
			),
		);
	}

	public function actionIndex()
	{
               
                
		$this->render('video');
	}

}
