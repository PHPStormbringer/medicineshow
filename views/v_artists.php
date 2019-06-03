<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>Artists</title>
<?php
include('assets/css/main.css');
include('views/header_deep.php');

class test
{
	
	public function __construct()
	{
		echo 'test';
	}
	
	
}

class v_artists
{
	public $arrPage;

	public function __construct($arrPage)
	{
		$this->arrPage = $arrPage;
		$this->index();
	}
	
	function index()
	{
		echo "<div id='artists'>";
		
		echo "<div class='show_data'>" . $this->arrPage['title']. "</div><br />";
		if($this->arrPage['subtitle'])
		{
			echo "<div class='show_data'>" . $this->arrPage['subtitle']. "</div><br />";
		}
		echo "<div class='show_data'>" . $this->arrPage['body']. "</div><br />";


		echo "</div>";
		
	}
}


?>