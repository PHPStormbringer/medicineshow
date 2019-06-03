<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>Word/Play</title>
<?php
include('assets/css/main.css');
include('views/header.php');

class v_wordplay
{
	public $arrPage;

	public function __construct($arrPage)
	{
		$this->arrPage = $arrPage;
		$this->index();
	//	print_r($this->arrAngels); 
	}
	
	function index()
	{
		echo "<div id='wordplay'>";
		echo "<div class='show_data'>" . $this->arrPage['title']. "</div><br />";
		if($this->arrPage['subtitle'])
		{
			echo "<div class='show_data'>" . $this->arrPage['subtitle']. "</div><br />";
		}
		echo "<br /><div class='show_data'>" . $this->arrPage['body']. "</div><br />";


		echo "</div>";
		
	}	
}
?>