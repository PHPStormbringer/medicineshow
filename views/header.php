<?php
if(!isset($_SESSION)){ session_start();}
?>
<!--<div id='wshow' style='width:100%;'></div>-->

<script type="text/javascript">

//    document.getElementById("wshow").innerHTML = document.getElementsByTagName("hdr").clientWidth; 
    
//    document.getElementById("wshow").innerHTML = document.documentElement.clientWidth;
    
    
function toggle_menu()
{
	if(document.getElementById('menu_bloc').style.display == 'block')
	{
		document.getElementById('menu_bloc').style.display = 'none';
	}
	else
	{
		document.getElementById('menu_bloc').style.display = 'block';
	}
}
    
</script>

<div id='workzone'>
	<div id='hdr'>
	
		<div id='company_name_mobi'><strong>Medicine Show Theatre Ensemble</strong></div>
		<div id='company_addr_desk'>549 West 52nd St., 3rd Floor,<br />New York, NY 10019<br />212 262-4216</div>
		<div id='company_name_desk'><strong>Medicine Show Theatre Ensemble</strong></div>
		<div id='company_addr_mobi'>549 West 52nd St., 3rd Floor,<br />New York, NY 10019<br />212 262-4216</div>
	
		<div id='donations'>
		        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="display:table-cell">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="B29T4XYEN7BXN">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
	
		<img id='three_bars' src='assets/img/three_bars.png' onclick='toggle_menu()' />
	
	</div><!-- #hdr -->


	<div id='wrapper'>

		<div id='menu_bloc' class='menu_bloc'>

			<div class='menu_item'><a href='home'>home</a></div>		
			<div class='menu_item'><a href='aboutus'>about us</a></div>	
			<div class='menu_item'><a href='angels'>angels</a></div>
			<div class='menu_item'><a href='contactus'>contact us</a></div>
			<div class='menu_item'><a href='history'>history</a></div>
			<div class='menu_item'><a href='jumpstart'>jumpstart</a></div>
			<div class='menu_item'><a href='rentals'>rentals</a></div>	
			<div class='menu_item'><a href='workshops'>workshops</a></div>
			<div class='menu_item'><a href='wordplay'>wordplay</a></div>
		<!--	<div class='menu_item'><a href='artists/?name=chrisbrandt'>Chris Brandt</a></div>-->
		</div><!-- menu_bloc -->

		<div class='main_content'>




