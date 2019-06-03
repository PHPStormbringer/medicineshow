<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>JumpStart</title>
<?php
include('assets/css/main.css');

include('views/header.php');


class v_jumpstart
{
	public $arrShows;

	public function __construct($arrShows)
	{
		$this->arrShows = $arrShows;
		$this->index();
	//	print_r($this->arrAngels); 
	}
	
	function index()
	{
		$current_season = "";
		
		echo "<div id='jumpstart'>JumpStart";
		
		foreach($this->arrShows as $show)
		{
		
			echo "<div>";
			//	echo "<div class='show_label'>season</div>    <div class='show_data season'>"    . $this->arrShows['season_id']. "</div><br />";

			if( $show['season_id'] != $current_season )
			{ 
		
				if ($current_season){ echo "<br /><hr />";}
				$current_season = $show['season_id']; 
				echo "<div class='show_label'>" . $current_season . "</div>"; 

				echo "<div>";
				echo "<div class='show_data title'>title</div>";
				echo "<div class='show_data authors'>authors</div>";

				echo "<hr />";
				echo "</div>";
			}
		

			echo "<div>";
			echo "<div class='show_data title'>"     . $show['title']. "</div>";
			echo "<div class='show_data authors'>"   . $show['authors']. "</div>";

		//	echo "<div class='show_label'>dates</div>     <div class='show_data dates'>"     . $show['dates']. "</div><br />";

			
		//	if ($show['directors']){ echo "<div class='show_label'>directors</div> <div class='show_data directors'>" . $show['directors']. "</div><br />"; }
		//	if ($show['notes']  ){ echo "<div class='show_label'>notes</div>   <div class='show_data notes'>"   . $show['notes']. "</div><br />"; }

			echo "</div>";
			
		}

		echo "</div>";
		
	}	
}


?>