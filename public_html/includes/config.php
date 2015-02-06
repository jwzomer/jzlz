<?
$site_is_live 			= false;
$site_is_a_redesign		= true;			//T or F - if they're a client of ours who is redesigning.  If True, fill out the next line.
$redesign_menu_addon 	= 'redesign'; 	//When doing a redesign, give this the name of the redesign folder.  Usually just "redesign."  

$org_id					= 'NAME';
$their_domain 			= 'nameorg.org';
$server_name 			= 'viethconsulting.com';
$host_number 			= '3';  //as in, "host7.viethwebhosting.com...".  ONLY MATTERS ON NEW CLIENTS- all new clients will be 7 for now
$contact_email 			= ''; //For contact_us.php
$org_name 				= 'National Association for Multicultural Education'; //Proper name for page title 
$ucc 					= false; //for when someone has mms.theirdomainname.com...

//Google stuff
$google_search_code 	= '006666080711133337058:h36rqr1a59c';

$functions = array(
	//PHP and Server Side Functions - please keep these alphabetical :)
	'event_feed.php'		=> true,
	'input_shortener.php' 	=> true,
	'log_in_form.php'		=> true,
	'menus.php'				=> true,
	'news_feed.php'			=> true,
	'search_box.php'		=> true,
	'slideshows.php' 		=> true,
	'svg_icons.php' 		=> true,
	
	//Javascript Fixer Functions - please keep these alphabetical
	
	'equal_height.js'		=> true,
	'formatPhoneLink.js'	=> true,
	'itemSlider.js'			=> true,
	'linkConverter.js'		=> true,
	'navPadder.js'			=> true,
	'user_image_hw_fix.js'	=> true,
	'vcenter.js'			=> true,
);

$news_options = array(
	'number_of_news_items'	=>	'4',				//# or F - #: Sets the amount of events to display; F: no limit - show all upcoming events
	'desc_text_limit'		=>	'120', 				//# or F - Sets the amount of characters for the description, or false for no limit
	'desc_text_hard_break'	=>	false,				//T or F - T: breaks description exactly at limit; F: breaks description after space following limit
	'desc_strip_tags'		=>	true,				//T or F - T: Strips everything except <br>; F: gives raw description
	'read_more_link'		=>	false,		//String or F - Sets the text for the "more" button; F: does not show a "read more" button/link
	'title_as_link'			=>	false,				//T or F - Display the title as a link
	'open_links_in_new_tab'	=>	false,				//T or F - T: Opens title and "more" links in new tab, F: opens title/"more" links in current tab
	'format_month'			=>	'F',				//See PHP's date() functionality
	'format_day'			=>	'l',				//--http://php.net/manual/en/function.date.php
	'format_year'			=>	'Y',
	'format_full_date'		=>	'M j Y',
	'template_file'			=>	'name-news.php',//File Name - This file has the HTML and CSS for one event item.  Create it and store it in the public_html folder
	'news_categories'		=>	array()				//array - make it like this 'category number' ,'category number' etc of accepted categories.  Get them from inspecting news cats.
);

$event_options = array(
	'number_of_events'		=>	'3',				//# or F - #: Sets the amount of events to display; F: no limit - show all upcoming events
	'desc_text_limit'		=>	'80', 				//# or F - Sets the amount of characters for the description, or false for no limit
	'desc_text_hard_break'	=>	true,				//T or F - T: breaks description exactly at limit; F: breaks description after space following limit
	'desc_strip_tags'		=>	true,				//T or F - T: Strips everything except <br>; F: gives raw description
	'read_more_link'		=>	false,		//String or F - Sets the text for the "more" button; F: does not show a "read more" button/link
	'title_as_link'			=>	true,				//T or F - Display the title as a link
	'open_links_in_new_tab'	=>	false,				//T or F - T: Opens title and "more" links in new tab, F: opens title/"more" links in current tab
	'format_month'			=>	'F',				//See PHP's date() functionality
	'format_day'			=>	'l',				//--http://php.net/manual/en/function.date.php
	'format_year'			=>	'Y',
	'format_full_date'		=>	'M j Y',
	'template_file'			=>	'name-events.php',	//File Name - This file has the HTML and CSS for one event item.  Create it and store it in the public_html folder
	'cal_type'				=>	array(),			//array - This MUST be an array if used.  Look up your cal types, and add the numbers surrounded by asterisks for the categories you wish to display - e.g. ['*123*', '*187*', '*404*']
	'highlight_class'		=>	'ev-highlight',		//CSS Class - Set a class for highlights - an option from the calendar admin.  If set, this class will be added to any events the admin specifies with the "highlight" option in news manager
);

//Don't worry about the stuff below this line
$lc_org_id = strtolower($org_id); 
$PTR = '/home/'.$lc_org_id.'/public_html/';
$PTR = '/home/'.$lc_org_id.'/public_html/';
if($host_number<5){
	$host = '';
} else {
	$host = 'host'.$host_number.'.';
}
$ssl_base = 'https://'.$host.'.viethwebhosting.com/~'.$lc_org_id.'/';
	$base = 'http://'.$host.'.viethwebhosting.com/~'.$lc_org_id.'/';
//$no_http_base = substr($base, strpos($base,':')+1).'/';
if(isset($_SERVER['HTTPS'])){
	$base = $ssl_base;
}
if($site_is_a_redesign == true){
	$base = '//'.$their_domain.'/'.$redesign_menu_addon.'/';
}
if($site_is_live == true || $site_is_a_redesign == true){
	$domain = $their_domain; 
} else {
	$domain = $host.'viethwebhosting.com/~'.$lc_org_id;
}
if($ucc == true){
	$server_name = 'mms.'.$domain;
}
if($site_is_live == true || $site_is_a_redesign == false){
	$redesign_menu_addon = '';
}
$calpref = 'list';
$top_left_div_feed = "announcements.htm";
?>	
