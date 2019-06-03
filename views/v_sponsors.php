<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>Sponsors</title>
<?php
include('assets/css/main.css');
include('views/header.php');

class v_sponsors
{
	public $arrSponsors;

	public function __construct($arrSponsors)
	{
		$this->arrSponsors = $arrSponsors;
		$this->index();
	//	print_r($this->arrSponsors); 
	}
	
	function index()
	{
		echo "<div id='sponsors'>";
		
		foreach($this->arrSponsors as $sponsor)
		{
			if($sponsor['uid'] == '1')
			{
				echo "<div style='width:50%;margin:auto'>";
				echo "<div class='sponsor_data'>". $sponsor['body']. "</div>";
				echo "</div>";
			}
			else
			{
				echo "<div style='display:inline-block;width:45%;border:solid 2px orange;background-color:yellow;margin:2px'>";				
				echo "<div class='sponsor_name'>". $sponsor['name']. "</div><div class='sponsor_data'>". $sponsor['body']. "</div>";
				echo "</div>";
			}
		}
		
		echo "</div>";
	}
	
	
}

?>