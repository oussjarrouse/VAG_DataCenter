<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="shortcut icon" href="favicon.ico">
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id="wrap">
	<div id="main">

		<div class="header">
			<h1 class="title"><?php echo CHtml::encode(Yii::app()->name); ?></h1>
		</div><!-- header -->

		<div class="content">

			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'homeLink'=>CHtml::link('Search Patient', array('/site/index')),
				'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
			<?php endif?>

			<?php echo $content; ?>

			<div class="clear"></div>

			<!--<div id="footer">
				Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
				All Rights Reserved.<br/>
				<?php echo Yii::powered(); ?>
			</div> footer -->

		</div><!-- container -->
	</div><!-- page -->
</div><!-- wrap -->

<div id="sidebar">
	<div class="header">
		<p class="title">Menu</p>
	</div><!--header-->
			
	<div class="content">
		<ul class="nav">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				array('label'=>'Search Patient', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			)); ?>
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
				));
				$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
				));
				$this->endWidget();
			?>
		</ul>
	</div>
</div><!-- sidebar menu -->
</body>
</html>
