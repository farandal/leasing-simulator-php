<? 
Yii::app()->clientScript->registerCssFile(
		Yii::app()->getAssetManager()->publish(
			Yii::getPathOfAlias('YumAssets').'/css/yum.css'));

$module = Yii::app()->getModule('user');
$this->beginContent($module->baseLayout); ?>

<div class="container">

<div class="span-19">
    <div id="content">
        <? echo $content;  ?>
    </div><!-- content -->
</div>


<div class="span-5 last">
		<div id="sidebar">
                    <? Yum::renderFlash(); ?>
                    <? 
                    if(Yum::hasModule('message')) {
                            Yii::import('application.modules.message.components.*');
                            $this->widget('MessageWidget');
                    }
                    if(Yum::hasModule('profile') && Yum::module('profile')->enableProfileVisitLogging) {
                            Yii::import('application.modules.profile.components.*');
                            $this->widget('ProfileVisitWidget'); 
                    }
                    $this->renderMenu(); ?>
                </div><!-- sidebar -->
</div>


</div>

<? $this->endContent(); ?>

