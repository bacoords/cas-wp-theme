<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
    
	<title>
		<?php wp_title( ' | ', true, 'right' ); ?> Community All Stars
	</title>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/scss/style.css" />
	<?php wp_head(); ?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/cart.js"></script>
	<?php include (TEMPLATEPATH."/lib/authorizealt.php"); ?>
</head>

<body <?php body_class(); ?> ng-app="cartApp">


<?php  get_template_part('navbar' );?>

