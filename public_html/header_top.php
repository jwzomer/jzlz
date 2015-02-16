<!DOCTYPE html>
<?
include('includes/config.php');
include('includes/functions.php');
?>
<html lang="en">
	<head>
		<title><?=($title!=''?$title." - ".$org_name:$org_name)?></title> 
		<meta name="keywords" content="<?=$keywords?>" />
		<meta name="description" content="<?=$description?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

		<!--<link rel="stylesheet" type="text/css" href="<?=$no_http_base;?>jpanelmenu.css" />-->

		<link rel="stylesheet" type="text/css" href="<?=$no_http_base;?>bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?=$base?>_jquery/css/custom-theme/jquery-ui-1.9.2.custom.min.css" />
		<link rel="stylesheet" type="text/css" href="<?=$base;?>_jquery/css/jquery.ui.potato.menu.css" />
		<link rel="stylesheet" type="text/css" href="<?=$base;?>_jquery/css/fullcalendar.css" />
		<link rel="stylesheet" type="text/css" href="<?=$base;?>_jquery/css/fullcalendar.print.css" media="print" />

		<script type="text/javascript" src="<?=$base?>_jquery/js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="<?=$base?>_jquery/js/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="<?=$base?>_jquery/js/jquery-ui-1.9.2.custom.min.js"></script>
		<script type="text/javascript" src="<?=$base?>_jquery/js/jquery.jpanelmenu.min.js"></script>
		
		<!--[if lt IE 9]>
			<script type="text/javascript" src="<?=$base?>_jquery/js/html5shiv.js?ccccombo_breaker=<?=$build_time?>"></script>
			<script type="text/javascript" src="<?=$base?>_jquery/js/respond.min.js?ccccombo_breaker=<?=$build_time?>"></script>
			<script type="text/javascript" src="<?=$base?>_jquery/js/modernizr.custom.36944.js?ccccombo_breaker=<?=$build_time?>"></script>
			
		<![endif]-->

		<!--<script type="text/javascript" src="<?=$base?>_jquery/js/fullcalendar.min.js"></script>-->
		<script type="text/javascript" src="<?=$no_http_base?>bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?=$base?>_jquery/js/_custom.js"></script>
		<link href="https://www.viethconsulting.com/_jquery/nivo/nivo-slider.css" media="screen" rel="stylesheet" type="text/css">
		

		<!-- GCal -->
		<!--<script src="//memberleap.com/_jquery/fullcalendar-1.5.3/fullcalendar/fullcalendar.min.js"></script>
		<link type="text/css" rel="stylesheet" href="<?=$no_http_base?>css/gcal.css" /> -->
		
		<!-- Google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>		
		<!-- Our style sheets -->
		<link rel="stylesheet" type="text/css" href="<?=$base;?>css/style.css?combobreaker=1" />
		<!--<link rel="stylesheet" type="text/css" href="<?=$base;?>css/mms-styles.css" />-->
		<link rel="stylesheet" type="text/css" href="<?=$base;?>css/navigation.css" />
		<link rel="stylesheet" type="text/css" href="<?=$base;?>css/media_query.css" /><!-- Always Load Last -->

				
		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script> 
		<style type="text/css">
				body{
					background-repeat: repeat;
				}
				.navbar-toggle{
					display: none; 
				}
				.ie8mademedoit{ 
					margin-top: 20px;
				}
			</style>
		<![endif]-->
	</head>
	<body>
		<script type="text/javascript">
			 $(function(){
				$('.user-input').children('img').each(function(){
					var W = $(this).width();
					$(this).removeAttr('height');
					$(this).removeAttr('width');
					$(this).css({'height':'', 'width':''});
				});
			 });
		</script>