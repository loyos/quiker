<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Quiker Wire'; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->script('jquery-1.10.2');
		echo $this->Html->script('jquery.flexslider');
		echo $this->Html->css('style');
		echo $this->Html->css('flexslider');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->meta(
			'favicon.ico',
			'/favicon.ico',
			array('type' => 'icon')
		);
	?>
	<script type="text/javascript" charset="utf-8">
		$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			directionNav: false, 
		});
		});
	</script>
</head>
<body>
	<div id="container">
		<div id="header">
			<div class = "logo">
				<?php echo $this->Html->link($this->Html->image('logo.png', array('width' => '210px')), array('controller' => 'index', 'action' => 'index'), array('escape'=> false)); ?>
				
			</div>
			<?php echo $this->element('menu'); ?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<div class = "wrapper">
				<div class = "left">
					QUIKERWIRE (C) 2014  |  PRIVACY POLICY
				</div>
				<div class = "right">
					<?php echo $this->Html->link($this->Html->image('header-twitter.png', array('width' => '40px')), 'https://twitter.com/quikerwireenvio', array('escape'=> false)); ?>
					<?php echo $this->Html->link($this->Html->image('header-facebook.png', array('width' => '15px')), 'https://www.facebook.com/quikerwire', array('escape'=> false)); ?>
					<?php echo $this->Html->link($this->Html->image('ig.png', array('width' => '40px')), 'http://instagram.com/quikerwireenvios', array('escape'=> false)); ?>
				</div>
			</div>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

<script>
	$( "#flashMessage" ).fadeOut( 5000 );
</script>