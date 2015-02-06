<?
/*
GENERAL INSTRUCTIONS
Please don't try opening this in a browser :D

For all of the newest functions, please turn them on (true) or off (false) from the config.php file.

Each function will have a major grouping, followed by the call-able functions and a list of their options.

Any function option can be created using a php variable ($myvariablename = 'whatevs') and called with the function, like this:

$myvariable = '<li>Click here for kittens!</li>';
quick_menu($myvariable);

OR you can pass the information directly in your call like this:

quick_menu('<li>So many kittens!</li>');

Any function with multiple variables, like quick_menu() must have their variables set in the proper order.  For example,
if you want to specify the "after" portion of quick_menu(), but not the "before" or "custom caret" portions, you would
write the call like this:

$myAfterVariable = 'lots of stuff';
quick_menu('',$myAfterVariable);

Since the first input is "before," something must be entered for "before." The two single quotes tell the function
that this input is empty.

Since the last input, "custom caret" is optional, nothing needs to be entered for it.

PASSING ARRAY OPTIONS
Many of the new functions expect an array of options.  The great thing about using this method is that you can set another array
of defaults, allowing you to play fast and loose.  Wherever you see "$options_array" in this manual, you'll need to pass the options like this: */

$myOptionsVariable = array(
	'option_name_1' 	=>	'value of option',
	'option_name_2'		=>	'value of option'
);
/*
IMPORTANT - please note the use of single quotes, commas after each option but the last one, the TAB style uniform spacing, 
and that fancy value-assigning arrow(=>)



/***********************************************************
***--- Event Feed
************************************************************
*** event_feed($options_array);

- IMPORTANT - event_feed() expects an array of options. If no option is specified, it reverts to the default event options listed here. 
- IMPORTANT - For each feed, you'll need to create a template file, or point the function at a template file you've uploaded.  The template file can make use of the following replacement keys:
		##TITLE##		
		##DESCRIPTION##	
		##DETAILS##
		##MORE_LINK##
		##URL##
		##LINK_1_TITLE##
		##LINK_1_URL##
		##LINK_2_TITLE##
		##LINK_2_URL##
		##HIGHLIGHT##
		
		
		##START_TIME##
		##END_TIME##
		##DAY##
		##MONTH##
		##YEAR##
		##DATE##

		##CONTACT_NAME##
		##CONTACT_EMAIL##
		##CONTACT_PHONE##

		##LOCATION_NAME##
		##ADDRESS_1##
		##ADDRESS_2## 		only shows up if it contains information
		##CITY##
		##STATE##
		##ZIP##
		
- Since defaults are enabled for event_feed(), no options actually need to be passed, but it's a good idea to at least set the 'template_file' option.*/

$event_defaults = array(
	'number_of_events'		=>	'3',					//# or F - #: Sets the amount of events to display; F: no limit - show all upcoming events
	'desc_text_limit'		=>	'80', 					//# or F - Sets the amount of characters for the description, or false for no limit
	'desc_text_hard_break'	=>	true,					//T or F - T: breaks description exactly at limit; F: breaks description after space following limit
	'desc_strip_tags'		=>	true,					//T or F - T: Strips everything except <br>; F: gives raw description
	'read_more_link'		=>	false,					//String or F - Sets the text for the "more" button; F: does not show a "read more" button/link
	'title_as_link'			=>	true,					//T or F - Display the title as a link
	'open_links_in_new_tab'	=>	false,					//T or F - T: Opens title and "more" links in new tab, F: opens title/"more" links in current tab
	'format_month'			=>	'F',					//See PHP's date() functionality for info on how to format these
	'format_day'			=>	'l',					//--http://php.net/manual/en/function.date.php
	'format_year'			=>	'Y',
	'format_full_date'		=>	'M j Y',
	'template_file'			=>	'my_template_file.php', //File Name - This file has the HTML and CSS for one event item.  Create it and store it in the public_html folder
	'cal_type'				=>	array(),				//array - This MUST be an array if used.  Look up your cal types, and add the numbers surrounded by asterisks for the categories you wish to display - e.g. ['*123*', '*187*', '*404*']
	'highlight_class'		=>	'ev-highlight',			//CSS Class - Set a class for highlights - an option from the calendar admin.  If set, this class will be added to any events the admin specifies with the "highlight" option in news manager
);



/***********************************************************
***--- Input Shortener
************************************************************
*** input_shortener('page_to_shorten.htm','end point','start point);
- IMPORTANT - Input shortener can shorten an input and store that in a variable to print later. 
If you just want input shortener to immediately print out the shortened input, use echo input_shortener('page.htm',200);
OR if you're just calling it on the fly, <?=input_shortener('page.htm',200);?>
- REQUIRED page_to_shorten.htm - This is the client input that you want to shorten
- REQUIRED end point - the number of characters that you would like to display
- OPTIONAL start point - defaults to zero, also known as the start of the file.

EXAMPLES:	*/
<?=input_shortener('front_welcome_text.htm',200); ?>
//or if you're already in PHP:
echo input_shortener('front_welcome_text.htm',200);



/***********************************************************
***--- Log In Form
************************************************************

*** log_in_form('menuType',$options_array);
- IMPORTANT- currently (1/21/2015) this function may only be used by bootstrap-enabled sites
- REQUIRED menuType - 7 options:
	--easy--
	* vertical - puts in the whole form in a vertical configuration
	* horizontal - puts in the whole form in a horizontal configuration
	--customizable--
	* form_start - starts the login form
	* input_user - inserts the username input
	* input_pass - inserts the password input
	* input_submit - inserts a submit button
	* form_end - ends the form
- OPTIONAL options_array - here are log_in_form defaults.  Pass an options array to overwrite any of these: */
	$log_in_defaults = array(
		'user_placeholder'	=> 'Username',
		'user_label'		=> 'Username',
		'user_class'		=> '',
		'pass_placeholder'	=> 'Password',
		'pass_label'		=> 'Password',
		'pass_class'		=> '',
		'submit_value'		=> 'Sign In',
		'submit_class'		=> ''
	);	/*

EXAMPLES:	*/

$lio = array(
	'user_placeholder' => '',
	'pass_placeholder' => ''
);
log_in_form('horizontal',$lio);  //easy and done!

log_in_form('form_start');	//one could call each of these in roughly this order to create a custom log-in form
log_in_form('input_user');
log_in_form('input_pass');
log_in_form('input_submit');
log_in_form('form_end');



/***********************************************************
***--- Menus
************************************************************

*** quick_menu('before','after','custom caret');
- OPTIONAL before & after: Anything entered here will be placed in the navigation UL before the first LI or after the last LI.
  Anything entered for before & after should be HTML starting with <li>... and ending with ...</li>
- OPTIONAL custom caret: If you'd rather have a graphic than a CSS caret, enter it for this third option.

EXAMPLES:     */

quick_menu(); //easiest, no options set

$before = "<li>Kitten time</li>";
$after = "<li>Thats Enough Kittens</li>";
quick_menu($before,$after) //function with inputs added via variables

quick_menu('<li>What is up with all these kittens?!</li>'); //function with inputs added directly

/*** mobile_menu('before', 'after', 'custom_button', 'custom caret');
- IMPORTANT - mobile_menu() should be called before your first <div class="container">
- OPTIONAL before & after - Just like in quick_menu()
- OPTIONAL custom_button - HTML, changes the button before "tap for navigation".  Currently set to an SVG of the burger icon
- OPTIONAL custom caret - HTML, changes the caret to a graphic if you don't want bootstrap's down arrow.

EXAMPLES: 	*/

mobile_menu(); //This is what i use 90% of the time.  See examples for quick_menu();



/***********************************************************
***--- News Feed
************************************************************

*** news_feed($option_array);
- IMPORTANT - news_feed() expects an array of options. If no option is specified, it reverts to the default news options listed here. 
- IMPORTANT - For each feed, you'll need to create a template file, or point the function at a template file you've uploaded.  The template file can make use of the following replacement keys:
	##DATE##,
	##DAY##,
	##MONTH##,
	##YEAR##,

	##TITLE##,
	##DESCRIPTION##,
	##URL##,
	##MORE_LINK##,
	##IMAGE##
- OPTIONAL - The news feed looks for an array of options and uses these defaults if no options are provided: */
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



/***********************************************************
***--- Search Box
************************************************************

*** search_box($options_array)
- IMPORTANT - search_box() is easy!  No option are needed and no defaults are set. Please do all your styling for this in your CSS
- The options array has two choices:	
	*bootstrap_button - values can be either "right" or "left."  If this option is not set, the search box will default to a non-bootstrap form.  If set, the form will contain the bootstrap classes "input-group" "input-group-addon" and "form-control" in their appropriate spots
	*submit_button - The value for the submit button.  If you want your button to have a word like, "submit" put that in there.
	
EXAMPLES:	*/
$mySearchOptions = array(
	'bootstrap_button' 	=> 'left',
	'submit_button'		=> 'Submit'
);
search_box($mySearchOptions);		//this one gives you a bootstrappy search box

search_box();						//this one gives you a regular HTML search box with no bootstrap classes and a blank submit button



/***********************************************************
***--- Slideshows
************************************************************

There are currently two call-able slideshows that function a little differently- quick_slideshow() and feature_box_slideshow()
*** quick_slideshow('slideshow number','speed')
- REQUIRED slideshow number - Grab this one from the slideshow manager.  It'll look like, "FD#" where # = the number of the slideshow you want to call
- OPTIONAL speed - This is given in thousandths of a second.  For an image to show for 7 seconds, 7000 would be the appropriate number.

EXAMPLES:	*/
quick_slideshow('FD2',8000); /*grabs slideshow number 2, and sets the slides to show for 8 seconds

*** feature_box_slideshow('slideshow number','number of boxes', 'template.php')
- REQUIRED slideshow number - Grab this one from the slideshow manager.  It'll look like, "FD#" where # = the number of the slideshow you want to call
- REQUIRED number of boxes - sets the number of feature boxes to display.  Keeps clients from adding 10000000000 feature boxes.
- REQUIRED template_file.php - Create a template using the following replacement keys and upload it to their public_html directory
	##TITLE##,
	##TEXT##,
	##LINK##,
	##IMAGE##

EXAMPLES: 	*/
feature_box_slideshow('FD4',3,'feature_box_template.php'); /* This example grabs slideshow number 4, makes 3 feature boxes, and uses the template 'feature_box_template.php' to create the boxes.



/***********************************************************
***--- SVG Icons
************************************************************

*** =svg_icon('icon name','size in pixels','color','class to insert on SVG');
- REQUIRED icon name - the icon name.  I'll make a separate page where we can see each of these and link it here soon.
- OPTIONAL size in pixels - just a number!  No "px" necessary!!  This will specify the height of the icon while the program finds the width.
- OPTIONAL color - This can be in ANY color format- #FFFFFF is just as good as rgba(255,255,255,1) here
- OPTIONAL class for SVG - useful if you're using a lot of SVG icons where you'll want color changes or to use JS to change the icon

EXAMPLES: 	*/
=svg_icon('facebook'); 				/* calls a 25xp high black facebook icon */
=svg_icon('twitter',50,'orange'); 	/* Calls a 50px high twitter icon that displays as orange 



***************************************************************************************************************************
***--- 											Javascript/Jquery functions                                          ---***
***************************************************************************************************************************


/***********************************************************
***--- Equal Height
************************************************************
- CLASS equal-height
- REQUIRED data-to - specifies the @media-width where this script stops functioning.  I usually set this to one of the bootstrap break points (990, 770, etc..)
- REQUIRED data-group - set the same data group for each element you'd like to be equal in height
Add the equal-height class to any group of siblings on a page.  Give them the same data-group, and give them a data-to.

EXAMPLES: */ 
<div class="col-md-3 equal-height" data-group="thisGroup" data-to="770">
	...
</div>
<div class="col-md-9 equal-height" data-group="thisGroup" data-to="770">
	...
</div>



/***********************************************************
***--- Format Phone Link
************************************************************
- CLASS phone-link
Give any link the class of phone-link in order to turn its mixed contents (often from a content manager file like foot_phone.htm) in order to turn it into a
click-able link people can call on their cell or through Skype.  When using this class, the href="" attribute becomes unnecessary as it will be changed via
the script.  It doesn't matter what punctuation your group uses in their phone numbers.  The script will remove it for the link.

EXAMPLES: */
<a class="phone-link"><?readfile('front_phone_number.htm');?></a> 

<a class="phone-link">(517) 555-1212</a>

<a class="phone-link">517.555.1212</a>



/***********************************************************
***--- Item Slider
************************************************************
- CLASS ISControl - the click-able control element
- CLASS ISContent - the element that will hide or show when the control is clicked
- IMPORTANT - the control and the content MUST be siblings.  They MUST NOT have any other siblings with ISControl or ISContent

EXAMPLES: 	*/

<div>
	<div class="ISControl">Click to Hide Stuff</div>
	<div class="ISContent">
		Content to be hidden on click
	</div>
</div>



/***********************************************************
***--- Link Converter - AKA Quick Links
************************************************************
- CLASS link-convert - put this on the div full of links to convert.  Link converter will find any valid links and insert them in UL format.
Style the links in your CSS.  If you're using link-convert on a content page full of links, the script will remove anything that is not a link from that area.

EXAMPLES: 	*/
<div class="link-convert">
	<?readfile('front_page_links.htm');?>
</div>



/***********************************************************
***--- Nav Padder
************************************************************
- IMPORTANT - Nav padder is COMPLETELY automatic.  You can either turn it on or off from the functions array.



/***********************************************************
***--- User Image Height Width Fix
************************************************************
- CLASS user - Very useful for front page includes where clients can insert a picture.  This script will remove all of the 
height and width attributes added by the content manager and set the images to be responsive.  This is great if a client
keeps uploading large images into small spaces

EXAMPLES: 	*/
<div class="user">
	<?readfile('front_page_welcome.htm');?>
</div>



/***********************************************************
***--- Vertical Center
************************************************************
- CLASS vcenter - THIS ONE IS WONKY!  Put the class vcenter on any element that you'd like to center vertically.
- data-to - the point where vcenter should stop working.
- IMPORTANT - in order for vcenter to work, its parent element MUST have a height.  It's often used in conjunction with
equal-height in the header.

EXAMPLES:	*/
<div style="height: 500px">
	<div class="vcenter"> ... </div> //without data-to, item is always vertically centered
</div>

OR
// this example has two elements vertically centered down to @media(min-width: 770px)
<div class="equal-height" data-group="thisGroup" data-to="770">
	<div class="vcenter" data-to="770"> ... </div> 
</div>
<div class="equal-height" data-group="thisGroup" data-to="770">
	<div class="vcenter" data-to="770"> ... </div> 
</div>
?>