<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>Angels</title>
<?php
include('assets/css/main.css');
include('views/header.php');

class v_angels
{
	public $arrAngels;

	public function __construct($arrAngels)
	{
		$this->arrAngels = $arrAngels;
		$this->index();
	//	print_r($this->arrAngels); 
	}
	
	function index()
	{
	//	print_r($this->arrAngels);
		
		echo "<div id='angels'>";
		
		foreach($this->arrAngels as $angel)
		{
			if($angel['uid'] ==  '1')
			{
				echo "<div>". $angel['name']. "</div><div>". $angel['body']. "</div><br /><br />";
			}
			else
			{
			//	echo "<div>". $angel['name']. "</div><div>". $angel['body']. "</div>";
				
				echo "<div style='width:95%;border:solid 2px orange;background-color:yellow;margin:2px'>";				
				echo "<div class='sponsor_name'>". $angel['name']. "</div><div class='sponsor_data'>". $angel['body']. "</div>";
				echo "</div>";
				
			}
		}
		echo "</div>";
	}
}

?>