<?php
/**
 * ApiModule.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 9/3/12
 * Time: 7:52 PM
 */
class ApiModule extends CWebModule {

	public function init(){
               
		parent::init();
		Yii::import('application.modules.api.components.*');
               

		$components = array(
			'request' => array(
				'class' => 'HttpRequest',
				'enableCsrfValidation' => true,
			)
		);

		Yii::app()->setComponents($components, false);
               
               
                $return = true;
		if(Yii::app()->user->isGuest) {
			Yii::app()->user->loginRequired();
                        $return = false;
                        
                } 
                

		return $return;
                
              
               
	}
}