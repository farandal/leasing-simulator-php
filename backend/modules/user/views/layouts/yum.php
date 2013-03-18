<? 
Yii::app()->clientScript->registerCssFile(
		Yii::app()->getAssetManager()->publish(
			Yii::getPathOfAlias('application.modules.user.assets.css').'/yum.css'));

$module = Yum::module();
$this->beginContent($module->baseLayout); ?>


<div class="container">
	<div class="span-19">
		<div id="content">
			<? if($this->title) printf('<h2> %s </h2>', $this->title);  ?>
                        <? echo $content;  ?>
                    
                        <?
                        if (Yum::module()->debug) {
                                echo CHtml::openTag('div', array(
                                                        'style' => 'background-color: red;color:white;padding:5px;'));
                                echo Yum::t('You are running the Yii User Management Module {version} in Debug Mode!', array(
                                                        '{version}' => Yum::module()->version));
                                echo CHtml::closeTag('div');
                        }
                        ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			/*$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();*/
		?>
                    
                    
                <? Yum::renderFlash(); ?>
                <? $this->renderMenu(); ?>
		</div><!-- sidebar -->
	</div>
</div>



<? $this->endContent(); ?>




