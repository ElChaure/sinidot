<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span3">
        <div id="sidebar">
        <?php
		    echo "<b>";
		    echo Yii::app()->user->name;
			if(!Yii::app()->user->isGuest) {
			   echo "<br>";
			   echo "<i>";
			   //echo Yii::app()->user->Rolnb;
			   echo "</i>";
			   echo "</b>";
			   echo "<br>";
			}   
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Operaciones',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
        ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>