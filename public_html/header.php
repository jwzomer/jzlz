<?include('header_top.php');?>
		<div class="container" id="body-container">
			<div id="head-row" class="row">
				<div id="head-col-1" class="col-md-3">
				</div>
				<div id="head-col-2" class="col-md-3">
				</div>
				<div id="head-col-3" class="col-md-3">
					<? include('images/fb.svg');?>
				</div>
			</div>
			<div id="logo-row" class="row">
				<div class="col-md-3"></div>
				<div id="logo-col" class="col-md-3">
					<a class="block-link" href="<?=$base?>">
						<div id="logo-wrapper">
							<? include('images/gtar-logo.png');?>
						</div> 
					</a>
				</div>
				<div id="head-col-3" class="col-md-3">
					<a class="block-link" href="https://www.facebook.com/GreaterTexomaAssociationRealtors"><? include('images/fb.svg');?> Click to like us on Facebook</a>
				</div>
			</div>
			<!-- Bootstrap navigation goes here -->
			<div id="body-row">
				<div class="col-md-12">
						<? 
						if($home!='Y'){
							echo '<h1 class="title">'.$title.'</h1>'; 
						}
						?>
					<!-- Add this without parenthesis to div for mobile nav to use Bootstrap's affix plugin for scrolling navbar (data-spy="affix" data-offset-top="60" data-offset-bottom="200") -->
		
		