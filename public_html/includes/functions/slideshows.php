<?
/*

-------Quick Slideshows
Slide Shows can now quickly be called with this:
<?=quickSlideShow('Slideshow Number', 'Speed');?>

- Slideshow Number: This is found in the slideshow manager, and looks like this: FD[number]
- (OPTIONAL) Speed: 5000 = 5 seconds.  The slideshow defaults to 5000

*/
function get_slideshow_data($speed = '5000',$slideshow,$needed = 'hard'){
	global $org_id;
	global $server_name;
	if($needed = 'easy'){
		$url = 'https://'.$server_name.'/slideshows/bootstrap_feed.php?org_id='.$org_id.'&ban='.$slideshow.'&int='.$speed;		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
		$data = curl_exec($ch);
		curl_close($ch);  
		if($data && strlen($data) > 2){
			$data = json_decode($data, true);
			return $data['html'];
		}else{
			return 'SLIDESHOW NOT CONFIGURED';
		}
	} else {
		$url = 'https://'.$server_name.'/slideshows/json_feed.php?org_id='.$org_id.'&ban='.$slideshow;		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}
function quick_slideshow($slideshow, $speed='5000'){
	return get_slideshow_data($speed,$slideshow,'easy');
}

/*
-------Feature Box Slideshow - A slideshow for feature boxes
*/
function feature_box_slideshow($slideshow,$display_number,$template){
	get_slideshow_data(null,$slideshow);	
	if($data && strlen($data) > 2){
		$data = json_decode($data, true);
		$randNum = mt_rand();
		$replace_keys = array(
			'##TITLE##',
			'##TEXT##',
			'##LINK##',
			'##IMAGE##'
		);
		$slide_template = file_get_contents($template);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		$slide_count = 1;
		foreach($data as $key => $value){
			if($slide_count>$display_number){
				continue;
			}
			if($value['alt'] != ''){
				$ss_alt = $value['alt'];
			} else {
				$errors .= 'One or more of your feature boxes needs some text (alt text)';
			}
			if($value['cap'] != ''){
				$ss_caption = $value['cap'];
			} else {
				$errors .= 'One or more of your feature boxes needs a title (caption)';
			}
		
			$replace_with = array(
				$ss_caption,
				$ss_alt,
				$value['url'],
				$value['src']
			);
			$slides .= str_replace($replace_keys,$replace_with,$slide_template);
		}
	}
	if($errors == ''){
		return $slides;
	} else {
		echo $errors;
	}
}

/*
-------HC Slideshow
*/
function hc_slideshow($slideshow,$speed='7000'){
	get_slideshow_data($speed,$slideshow);
	if($data && strlen($data) > 2){
		$data = json_decode($data, true);
		$randNum = mt_rand();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		$slide_number = 0;
		$fs=1;
		foreach($data as $key => $value){
			$alt = ($value['alt'] != '')?'<p>'.$value['alt'].'</p>':'';
			$caption = ($value['cap'] != '')?'<div class="carousel-caption"><p>'.$value['cap'].'</p>'.$alt.'</div>':'';
			if($fs<=1){
				$active = " active";
				++$fs;
			} else {
				$active = '';
			}
			$slides .= '<div class="item '.$active.'" data-slide-number="'.$slide_number.'">';
			$slides .= ($value['url'] !='')?'<a href="'.$value['url'].'" >':'';
			$slides .=	'<img src="'.$value['src'].'" alt="" title="" />'.$caption;
			$slides .=	($value['url'] !='')?'</a>':'';
			$slides .= '</div>';
			$indicators .= '<li data-target="#carousel_'.$randNum.'" data-slide-to"'.$slide_number.'"></li>';
			
		}
		echo '<div id="carousel_'.$randNum.'" class="carousel slide">';
		 // echo '	<ol class="carousel-indicators">
				 // '.$indicators.'
			 // </ol>';
		echo '<div class="carousel-inner">
				'.$slides.'
			</div>
				<a class="carousel-control left" href="#carousel_'.$randNum.'" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#carousel_'.$randNum.'" data-slide="next">&rsaquo;</a>
			</div>
			<script type="text/javascript">
				$(\'.carousel\').carousel({ 
					interval: 7000 
				});
			</script>';
	}else{
		echo 'SLIDESHOW NOT CONFIGURED';
	}
}
echo '<!-- Slideshows Loaded -->';
?>