<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo @$title; ?></title>
        
        <link rel="icon" href="<?php echo base_url('assets/img/civue.png')?>">
		<!-- icon.css also includes font-face for text -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bulma.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
		<?php
			if(@$styles) {
			foreach ($styles as $css) : ?>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url($css . '.css'); ?>" media="screen,projection"/>
		<?php endforeach; }?>

		<script src="<?php echo base_url('assets/js/vue.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/axios.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
	</head>
	<body class="loaded">
		<?php 
			echo $yield; 
		?>
    </body>
    
    <script src="<?php echo base_url('assets/js/pagination.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/app.js');?>"></script>
	<?php 
		if(@$scripts) {
		foreach ($scripts as $js) : ?>
			<script type="text/javascript" src="<?php echo base_url($js . '.js'); ?>"></script>
	<?php endforeach; }?>
</html>
