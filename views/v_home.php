<?php
if(!isset($_SESSION)){ session_start();}
/*
include 'assets/js/generic.js';
include 'assets/js/jquery.touchSwipe.min.js';
include 'assets/js/jquery-2.1.1.min.js';
include 'assets/js/reelslideshow.js';
*/

if(1 == 1)
{
include('views/html_header.php');

?>
<title>Title of the document</title>
<script type="text/javascript" src="assets/js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/reelslideshow.js">
	/***********************************************
	* Continuous Reel Slideshow- (c) Dynamic Drive (www.dynamicdrive.com)
	* Please keep this notice intact
	* Visit http://www.dynamicdrive.com/ for this script and 100s more.
	***********************************************/
</script>


<script type="text/javascript">
/* I can move this array to an external file */
var arrPics = [
["assets/179/img/majorbarbara.png"],
["assets/slideshow/AintWeGotFun.png"],
["assets/slideshow/Camino_Real_21.png"],
["assets/slideshow/classycomics.png"],
["assets/slideshow/classycomics001.png"],
["assets/slideshow/Finnegans_Wake_1104.png"],
["assets/slideshow/Fire_Exit_0345.png"],
["assets/slideshow/FMF_1.png"],
["assets/slideshow/Frank_n_Stein_001.png"],
["assets/slideshow/frog_1.png"],
["assets/slideshow/glowworm1006.png"],
["assets/slideshow/HappiestGirl_3235.png"],
["assets/slideshow/Hooray_for_What_088.png"],
["assets/slideshow/Living_with_History_0099.png"],
["assets/slideshow/MakingMoney_0008.png"],
["assets/slideshow/MedicineShow_001.png"],
["assets/slideshow/med_show_hamlet_20091220_31.png"],
["assets/slideshow/Nize_Baby_0232.png"],
["assets/slideshow/Nymph_Errant_2.png"],
["assets/slideshow/OnTheBorder_0068.png"],
["assets/slideshow/Paris_0085.png"],
["assets/slideshow/Republic_of_Poetry_4086.png"],
["assets/slideshow/Tom_Thumb_28.png"],
["assets/slideshow/Undercover_Lover_9669.png"],
["assets/slideshow/05_med_res.png"],
["assets/slideshow/15_med_res.png"]
];

</script>
<script type="text/javascript">

function ms_slideshow(x,y)
{

	if(x == 0)
	{
		var firstreel=new reelslideshow({
			wrapperid: "myreel", //ID of blank DIV on page to house Slideshow
			dimensions: [300, 200], //width/height of gallery in pixels. Should reflect dimensions of largest image
			imagearray: [
				["assets/slideshow/Finnegans_Wake_1104.png"]
			],
			displaymode: {type:'manual', pause:50000, cycles:0, pauseonmouseover:true},
			orientation: "h", //Valid values: "h" or "v"
			persist: true, //remember last viewed slide and recall within same session?
			slideduration: 50000 //transition duration (milliseconds)
		})		
	}
	else
	{
		var firstreel=new reelslideshow({
			wrapperid: "myreel", //ID of blank DIV on page to house Slideshow
			dimensions: [300, 200], //width/height of gallery in pixels. Should reflect dimensions of largest image
			imagearray: y,
			displaymode: {type:'auto', pause:4000, cycles:0, pauseonmouseover:true},
			orientation: "h", //Valid values: "h" or "v"
			persist: true, //remember last viewed slide and recall within same session?
			slideduration: 700 //transition duration (milliseconds)
		})
	
	}
}

if (window.innerWidth > 769)
{
   	ms_slideshow(1,arrPics);
}

var globalResizeTimer = null;

window.addEventListener('resize', function(event)
{
    if(globalResizeTimer != null) window.clearTimeout(globalResizeTimer);

    globalResizeTimer = window.setTimeout(function() 
	{
		if (window.innerWidth < 768)
		{
        	ms_slideshow(0);
		}
		else
		{
			setTimeout(function(){ ms_slideshow(1,arrPics); }, 10000);
		}
    }, 200);
});

</script>


<?php
}

include('assets/css/main.css');

include('views/header.php');


class v_home
{
	public $arrShows;
	public $arrJumpStart;
	public $arrBlocs;

	
	public function __construct($arrShows, $arrJumpStart="null", $arrBlocs="null")
	{
		$this->arrShows = $arrShows;
		$this->arrJumpStart = $arrJumpStart;
		$this->arrBlocs = $arrBlocs;


		$this->index();
	//	print_r($this->arrAngels); 
	}
	
	function index()
	{
		$current_season = "";
				
		echo "<div id='home'>";
                echo "<div id='r_column' style='width:50%;float:right;border:solid 1px red;'>";

		foreach($this->arrBlocs as $bloc)
		{
		    if($bloc['rightleft'] == 2)
		    {
        

			if($bloc['type'] == 'video_bloc')
			{
				echo "<div style='width:100%;margin:20px auto;border:solid 1px red'>";
				print_r($bloc['body']);
				echo "</div>";
			}
			else
			{

				print_r($bloc['body']);
			}
		    }
		}

		
		echo "</div><!-- r_column -->";
                echo "<div id='l_column'>";

		foreach($this->arrBlocs as $bloc)
		{

		    if($bloc['rightleft'] == 1)
		    {
        

			if($bloc['type'] == 'message_box')
			{
				echo "<div id='".$bloc['name']."' class='messagebox'>";

				print_r($bloc['body']);
				echo "</div>";
			}
			else
			{

				print_r($bloc['body']);
			}
		    }
		}
?>

<!--
<div id='msgSponsors' class='messagebox'>"Please patronize ours sponsors. Click <a href='/medicineshow/sponsors'>here</a> for nearby restaurants and businesses" </div>
			
<div id='msgFacebook' class='messagebox'>"Medicine Show is on Facebook -- <a href='https://www.facebook.com/medicineshowtheatrenow/'>visit us</a> and find regular updates and weekly writings by company members."</div>
-->		
<?php
			
		foreach($this->arrShows as $show)
		{
		//	Set Dependencies
			switch($show['stage'])
			{
				case '1 - Main Stage Production':
					$stage_bkgd = 'mainstage';
					break;
				case '2 - Staged Reading':
					$stage_bkgd = 'staged_reading';
					break;
				case '3 - Reading':
					$stage_bkgd = 'reading';
					break;
				case '4 - Guest Artist':
					$stage_bkgd = 'guest_artist';
					break;
				case '5 - Guest Production':
					$stage_bkgd = 'guest_production';
					break;
				case '6 - Announcement':
					$stage_bkgd = 'announcement';
					break;
				case '7 - Film':
					$stage_bkgd = 'film';
					break;
				default:
				//	code to be executed if n is different from all labels;
			}
			
		
			echo "<div class='show_box'>";
			echo "<div class='main_show_detail $stage_bkgd'>";
			echo "<a href='production/?id=".$show['id']."' />";	

			if($show[pics][0]['pic_name'] && $show[pics][0]['type'] == '1')
			{
				echo "<div id='show_img_box'>";
				echo "<img style='width:100%' src='assets/" . $show['id'] . "/img/" . $show[pics][0]['pic_name'] . "' />";
				echo "</div>";
			}
				
			if($show['title'])
			{
				echo "<div class='show_data_title'>"     . $show['title']. "</div><br />";
			}


			if($show['dates'])
			{
				echo "<div class='show_label'>dates</div>     <div class='show_data dates'>"     . $show['dates']. "</div><br />";
			}
				
			if($show['authors'])
			{
				echo "<div class='show_label'>authors</div>   <div class='show_data authors'>"   . $show['authors']. "</div><br />";
			}

			if ($show['directors']){ echo "<div class='show_label'>directors</div> <div class='show_data directors'>" . $show['directors']. "</div><br />"; }
			if ($show['artists']  ){ echo "<div class='show_label'>artists</div>   <div class='show_data artists'>"   . $show['artists']. "</div><br />"; }
			if ($show['cast']     ){ echo "<div class='show_label'>cast</div>      <div class='show_data cast'>"      . $show['cast']. "</div><br />"; }

			if ($show['short_desc']     )
			{ 
				echo "<div class='show_data_desc'>"      . $show['short_desc']. "</div><br />"; 
			}
			elseif ($show['long_desc']     )
			{ 
				echo "<div class='show_data_desc'>"      . $show['long_desc']. "</div><br />"; 
			}

			echo "</a>";
			echo "</div><!-- 'main_show_detail' -->";	
			
		}

		foreach($this->arrJumpStart as $jump)
		{
		

			if($jump['title'] == 'JumpStart')
			{
			
			}
			echo "<div class='home_jumpstart'>JumpStart<br />";
				echo "<div class='show_label'>title</div>     <div class='show_data title'>"     . $jump['title']. "</div><br />";
				echo "<div class='show_label'>dates</div>     <div class='show_data dates'>"     . $jump['dates']. "</div><br />";

				echo "<div class='show_label'>authors</div>   <div class='show_data authors'>"   . $jump['authors']. "</div><br />";
				if ($jump['directors']){ echo "<div class='show_label'>directors</div> <div class='show_data directors'>" . $jump['directors']. "</div><br />"; }
				if ($jump['notes']     ){ echo "<div class='show_label'>desc</div>      <div class='show_data desc'>"      . $jump['notes']. "</div><br />"; }

			echo "</div>";			
			
		}

		
		echo "</div>";
		
	}	
}


?>


