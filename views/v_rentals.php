<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>Rentals</title>
<?php
include('assets/css/main.css');
include('views/header.php');

class v_rentals
{
	public $arrPage;

	public function __construct($arrPage = null)
	{
		$this->arrPage = $arrPage;
		$this->index();
	//	print_r($this->arrAngels); 
	}

	
	function index()
	{
/*		echo "<div id='rentals'>";
		echo "<div class='show_data'>" . $this->arrPage['title']. "</div><br />";
		echo "<div class='show_data'>" . $this->arrPage['subtitle']. "</div><br />";
		echo "<div class='show_data'>" . $this->arrPage['welcome']. "</div>";
*/

/*		
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

*/
?>

<div id="rentals" class="rentals">
<div class="rental_display">

	<?php echo $this->arrPage['title']; ?>	
	<?php echo $this->arrPage['subtitle']; ?>
	<?php echo $this->arrPage['body']; ?>
	<!--
	<div id="title">Medicine Show Theatre is available for rent</div>
    <div id="upper_text">
    
		<p>Email <strong><a href="mailto:rentals@medicineshowtheatre.org">rentals@medicineshowtheatre.org</a></strong> or contact Richard Keyser (Technical Director) at 347.493.6577 for more information or to schedule a walk-through.</p>
        <p>Click the <a href="#anchor_thumbnail">thumbnails below</a> the main image for additional views of the space.</p>
        <p>Scroll down or <a href="#specs">click here</a> for technical specification and pricing info.</p>
    </div>
	-->
    <img id="space_pics" class="space_pics" src="assets/img/rentals/med_show_theater_20110728_04.png">
    <br /><br />
	
	<a id="anchor_thumbnail"></a>
    <center>
	<div id="thumb_holder">
        <img onclick="pic_switch(this);" class="pre_load" src="assets/img/rentals/med_show_theater_20110728_04.png">
        <img onclick="pic_switch(this);" class="pre_load" src="assets/img/rentals/med_show_theater_20110728_03.png">
        <img onclick="pic_switch(this);" class="pre_load" src="assets/img/rentals/med_show_theater_20110728_01.png">
        <img onclick="pic_switch(this);" class="pre_load" src="assets/img/rentals/med_show_theater_20110728_09.png">
        <img onclick="pic_switch(this);" class="pre_load" src="assets/img/rentals/med_show_theater_20110728_08.png">
        <img onclick="pic_switch(this);" class="pre_load" src="assets/img/rentals/med_show_theater_20110728_07.png">
    </div>
	</center>
    
    <a id="specs"></a>
	<div id="lower_text">
		<!--
		<p class="subhead">Technical specifications:</p>
		<ul>
            <li>480 square foot (20' wide, 24' deep) black box, 60 seat house</li>
            <li>Approximately 60 working lighting instruments, with 24 dimmer rack (Sensor 512, 2.4k dimmers)</li>
            <li>ETC Express lighting board (programmable, toggles between one scene w/ subs or two scene setup)</li>
            <li>Mackie 12-channel sound board (1/8" input, CD, capacity for up to 6 mics), with two powered PAs (Behringer EuroLive B220)</li>
        </ul>
    	
        <p class="subhead">Standard rates:</p>
        <ul>
			<li>$350/night for performance (includes 2 days of technical rehearsal time prior to your opening)</li>
			<li>$1300 for a standard 4-performance week (Thurs-Sun)</li>
			<li>$15/hour for rehearsal time</li>
		</ul>
		-->
<?php echo $this->arrPage['lower_body']; ?>
	</div>
	
	
</div>
</div>



<script>

function pic_switch(x)
{
	document.getElementById('space_pics').src = x.src;
	
}

</script>


		
<?php		
	/*	echo "</div>"; */
		
	}	
}
?>