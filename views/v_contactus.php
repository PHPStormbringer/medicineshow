<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>Contact Us</title>
<?php
include('assets/css/main.css');
include('views/header.php');

class v_contactus
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
		echo "<div class='show_data'>" . $this->arrPage['subtitle']. "</div><br />";
		echo "<div class='show_data'>" . $this->arrPage['welcome']. "</div>";
		
		if($this->arrPage['address'])
		{
			echo "<br /><br />";
			echo "<div class='show_label'>address</div>";
			echo "<div class='show_data' >" . $this->arrPage['address']. "</div>";
		}
		
		if($this->arrPage['email'])
		{
			echo "<br /><br />";
			echo "<div class='show_label'>email</div>";
			echo "<div class='show_data' >" . $this->arrPage['email']. "</div>";
		}
		
		if($this->arrPage['phone'])
		{
			echo "<br /><br />";
			echo "<div class='show_label' >phone</div>";
			echo "<div class='show_data'  >" . $this->arrPage['phone']. "</div>";
		}
		
		if($this->arrPage['twitter'])
		{
			echo "<br /><br />";
			echo "<div class='show_label' style='display:inline-block;vertical-align:top;'>twitter</div>";
			echo "<div class='show_data'  style='display:inline-block;vertical-align:top;' >" . $this->arrPage['twitter']. "</div>";
		}

		
		if($this->arrPage['facebook'])
		{
			echo "<br /><br />";
			echo "<div class='show_label' style='display:inline-block;vertical-align:top;'>facebook</div>";
			echo "<div class='show_data'  style='display:inline-block;vertical-align:top;' >" . $this->arrPage['facebook']. "</div>";
		}

		echo "<br />";		
		echo "</div>";
		
	}	
}
?>