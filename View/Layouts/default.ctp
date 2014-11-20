<?php
/**
 *
 *
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
if ($this->name == "TrainRoutes") {
	$cakeDescription = "Metro Routes";
	$topUrl = "trainRoutes";
} else {
	$cakeDescription = "Tester";
	$topUrl = "tests";
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('style');
		echo $this->Html->script('jquery-1.11.1.min.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<meta name="viewport" content="width=device-width, 
　initial-scale=1.0, user-scalable=yes">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/bootstrap/3.2.0/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/bootstrap/3.2.0/css/theme.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="header">
          <?php echo $this->Html->link($cakeDescription, '/' .$topUrl , array('class' => 'navbar-brand')); ?>
        </div>
      </div>
    </div>

    <div class="container" role="main">
	  <?php echo $this->Session->flash(); ?>
	  <?php echo $this->fetch('content'); ?>
	</div>

	<?php if ($this->name != "TrainRoutes") { ?>
	<div class="mastfoot">
        <div class="inner">
    	<p>
    		<?php echo $this->Html->link('Tests', array('controller' => 'tests', 'action' => 'index')); ?>
    	</p>
        </div>
    </div>
	<?php } ?>
</body>
</html>
