   <? echo CHtml::beginForm(array('//user/auth/login')); 
    
    $link = '//' .
    Yii::app()->controller->uniqueid.'/'. Yii::app()->controller->action->id;
    echo CHtml::hiddenField('quicklogin', $link);
    ?>
    
        <? echo CHtml::errorSummary($model); ?>
        
           <? //echo CHtml::activeLabelEx($model,'username'); ?>
            <? echo CHtml::activeTextField($model,'username', array('size' => 10,'placeholder'=>'Username','class'=>'input-medium')) ?>
        
        
            <? //echo CHtml::activeLabelEx($model,'password'); ?>
            <? echo CHtml::activePasswordField($model,'password', array('size' => 10,'class'=>'input-medium','placeholder'=>'Password')); ?>
        
        
       
			<?
			if(Yum::hasModule('registration') 
					&& Yum::module('registration')->enableRecovery)
			echo CHtml::link(Yum::t('Lost password?'), 
				Yum::module('registration')->recoveryUrl); ?>
		
        

            <button class="btn">reset</button>
            <? // por alguna razon no funciono el Yum::t('Login') ?>
            <? echo CHtml::submitButton('Login', array('class'=>'btn btn-primary')); ?>

    <? echo CHtml::endForm(); ?>

