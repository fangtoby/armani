<?php $this->beginContent('/layouts/main'); ?>
	<div class="span-26 last ">
		<div id="sidebar" class="clearfix">
        <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			//'title'=>'菜 单',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
		</div><!-- sidebar -->
	</div>
	<div class="span-26 last">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
<?php $this->endContent(); ?>