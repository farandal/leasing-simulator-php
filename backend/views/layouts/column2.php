<?php $this->beginContent('//layouts/main'); ?>
<div class="container row-fluid">
	<div class="span9">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span3 last">
		<div id="sidebar" class="well">
		<?php
			/*$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));*/
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations nav nav-list'),
			));
			//$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>