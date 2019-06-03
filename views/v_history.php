<?php
if(!isset($_SESSION)){ session_start();}

include('views/html_header.php');
?>
<title>History</title>
<?php
include('assets/css/main.css');

include('views/header.php');


class v_history
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
		
		echo "<div id='history'>";
		
		foreach($this->arrShows as $show)
		{
		
		echo "<div>";
		//	echo "<div class='show_label'>season</div>    <div class='show_data season'>"    . $this->arrShows['season']. "</div><br />";

		if( $show['season'] != $current_season )
		{ 
			$current_season = $show['season']; 
			echo "<div class='show_label'>" . $current_season . "</div>"; 
		}
		else
		{
			echo "<div class='show_label'>&nbsp;</div>";
		}
		
		echo "<div class='show_data'><a href='production/?id=" . $show['id'] . "'>" . $show['title'] . "</a></div><br />";

		echo "</div>";
		}		
	}	
}


?>