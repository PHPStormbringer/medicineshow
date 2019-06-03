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
	}
	
	function index()
	{
		echo "<br /><div>season</div>";

?>

<!--
<div id='page_subtitle'>There are many ways to contact us:</div>


<div id='wordplay'>
<div class='col1'>By Telephone:</div><div class='col2'>212-262-4216</div>
<div class='col1'>By Mail:</div>    <div class='col2'> Medicine Show Theatre</div> 
<div class='col1'></div>             <div class='col2'>549 West 52nd St., 3rd Floor</div>
<br />
<div class='col1'></div>             <div class='col2'>New York, NY 10019</div> 
<div class='col1'>By Email:</div>    <div class='col2'>medicineshow@medicineshowtheatre.org  (general email)</div> 
<div class='col1'></div>             <div class='col2'>cbrandt@medicineshowtheatre.org (Chris Brandt - Managing Director) </div>
</div>

--OR--

<div>Join our MAILING LIST!</div>
<div>All you have to do is enter your email Address, and click the button! We do the rest!</div>

<br />
<div>Submit </div>
<div>Tell me more! </div>
<div>Please remove me from the mailing list</div>
-->		

<?php		



	}
}

include('views/footer.php');

?>