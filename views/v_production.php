<?php
if(!isset($_SESSION)){ session_start();}
include('views/html_header.php');
?>
<title>Production Details</title>
<?php
include('assets/css/main.css');
include('views/header_deep.php');

class v_production
{
	public $arrShow;

	public function __construct($arrShow)
	{
		$this->arrShow = $arrShow;
		$this->index();
	//	print_r($this->arrAngels); 
	}
	
	function index()
	{
                echo "<div id='show_detail'>";

		if($this->arrShow['season'])   {echo "<div class='show_label'>season</div><div class='show_data season'>"       . $this->arrShow['season']. "</div><br />"; }
		if($this->arrShow['title'])    {echo "<div class='show_label'>title</div><div class='show_data title'>"         . $this->arrShow['title']. "</div><br />"; }
		if($this->arrShow['dates'])    {echo "<div class='show_label'>dates</div><div class='show_data dates'>"         . $this->arrShow['dates']. "</div><br />"; }
		if($this->arrShow['authors'])  {echo "<div class='show_label'>authors</div><div class='show_data authors'>"     . $this->arrShow['authors']. "</div><br />"; }
		if($this->arrShow['directors']){echo "<div class='show_label'>directors</div><div class='show_data directors'>" . $this->arrShow['directors']. "</div><br />"; }
		if($this->arrShow['artists'])  {echo "<div class='show_label'>artists</div><div class='show_data artists'>"     . $this->arrShow['artists']. "</div><br />"; } 
		if($this->arrShow['cast'])     {echo "<div class='show_label'>cast</div><div class='show_data cast'>"           . $this->arrShow['cast']. "</div><br />"; }
		if($this->arrShow['tickets'])  {echo "<div class='show_label'>tickets</div><div class='show_data tickets'>"     . $this->arrShow['tickets']. "</div><br />"; }


		echo "<div class='show_label'>desc</div>      <div class='show_data desc'>";


		    if($this->arrShow['long_desc'])  {echo $this->arrShow['long_desc']; }
		elseif($this->arrShow['short_desc']) {echo $this->arrShow['short_desc']; }

		echo "</div><br />";


                $i=0;
                foreach($this->arrShow['pics'] as $pics)
                {
                    if($this->arrShow['pics'][$i]['type'] == 2)
                    {
			echo "<div>";
			echo $this->arrShow['pics'][$i]['pic_name'];
			echo "</div>";
                    }
                }



                $i=0;
                foreach($this->arrShow['pics'] as $pics)
                {
                    if($this->arrShow['pics'][$i]['rank'] == 0 && $this->arrShow['pics'][$i]['type'] == 1)
                    {
			echo "<div>";
			echo "<center><img id='large_pic' style='width:90%;margin:auto;' src='../assets/" . $this->arrShow['id'] . "/img/" . $this->arrShow['pics'][$i]['pic_name'] . "' /></center>";
			echo "</div>";
                        
			break;
                    }
                }
                
                if(count($this->arrShow['pics']) > 1)
                {
                    $i=0;
                    foreach($this->arrShow['pics'] as $pics)
                    {
			echo "<div style='display:inline-block'>";
			echo "<img style='width:200px' src='../assets/" . $this->arrShow['id'] . "/img/" . $this->arrShow['pics'][$i]['pic_name'] . "' onclick='image(this.src)'/>";
			echo "</div>";
                        
			$i++;
                    }
                }

		echo "</div>";


	}	
}

?>

<script>

    function image(x) 
    {
        document.getElementById('large_pic').src = x; 

    }
</script>