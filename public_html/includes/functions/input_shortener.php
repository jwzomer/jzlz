<?/*
-------Input Shortener
-Got some input from a client that you need shortened?  Use this handy function!
The three attributes:
-$page - set this to 'whatever.htm' to pull in a page
-$end - The text limit to set
-$start [OPTIONAL] - A character other than the first one to start at.  Only use this if you're sure.  The first character is always 0 (zero)

To set the limit of welcome_text.htm to 200 characters, you would write it like this:
<? =input_shortener('welcome_text.htm',200); ?>
*/
function input_shortener($page,$end,$start=0){
	$page = file_get_contents($page);
	$page = strip_tags($page,'<br><br/>');
	nl2br($page);
	$short_text = (strlen($page)>$end)? substr($page, $start, $end).'&hellip;': $page;
	return $short_text;
}
echo '<!-- Input Shortener Loaded -->';
?>