<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>Workshops</title>
<?php
include('assets/css/main.css');
include('views/header.php');

class v_workshops
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
		echo "<div id='workshops'>";
		echo "<div class='show_data'>" . $this->arrPage['title']. "</div><br />";
		if($this->arrPage['subtitle'])
		{
			echo "<div class='show_data'>" . $this->arrPage['subtitle']. "</div><br />";
		}

		echo "<div class='show_data'>";
		
		
		?>
		<div style="width:90%;margin:20px auto;border:solid 1px red">
        		<embed id="vidClasses" autostart="1" src="http://www.youtube.com/v/1k9qcUaw_ZY" type="application/x-shockwave-flash">
		</div>
		<?php
		
		echo $this->arrPage['body']. "</div><br />";


		echo "</div>";
		
	}	
}

?>