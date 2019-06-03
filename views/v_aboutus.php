<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>About Us</title>
<?php
include('assets/css/main.css');
include('views/header.php');

class v_aboutus
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
		echo "<div id='aboutus'>";
		echo "<div class='show_data'>" . $this->arrPage['title']. "</div><br />";
		echo "<div class='show_data'>" . $this->arrPage['subtitle']. "</div><br />";
		echo "<div class='show_data'>" . $this->arrPage['body']. "</div><br />";


		echo "</div>";
		
	}	
}

?>