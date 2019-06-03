<?php
// **********************************************************************************************************
// name: m_jumpstart.php
// date: 12 oct 2016
// auth:  vvenning
//
// Proj: medicine show refresh
// **********************************************************************************************************
// SELECT, INSERT, UPDATE, DELETE functions for jumpstart MySQL table 
// **********************************************************************************************************

require_once('config/mysql_stuff.php');

class m_show_pics
{
    public $pic_id;
    public $show_id;
    public $pic_name;
    public $caption;
    public $rank;
    public $activ;

	public static $onePic;
	public static $allPics;
	
	public function __construct($arrPics)
	{
		echo "page: ".$page;
		$this->page = $page;
		$this->index();
	}

    public static function get_one_record_by_id()
	{
		if (isset($_GET['id']) && is_numeric($_GET['id']))
		{
			$this->pic_id = $_GET['id'];
		}
		
		$con = db_get::get_connection();
		
		if($this->pic_id)
		{ $query = "SELECT * FROM show_pics WHERE pic_id = " . $this->pic_id; }
		else 
		{ $query = "SELECT * FROM show_pics ORDER BY id DESC LIMIT 1"; }

        $result = db_get::QUERY($con, $query);

        $i = 0;

        $this->onePic = mysqli_fetch_array($result);
	
        db_get::NUKE_CXN($con);
	}	

    public static function get_records_by_show()
	{
	
		$con = db_get::get_connection();
		
		$query = "SELECT * FROM show_pics WHERE show_id = ".$this->show_id;
		$query = "SELECT * FROM show_pics";
        $result = db_get::QUERY($con, $query);

        while($row = mysqli_fetch_array($result))
        {
			$this->allPics[] = $row;
        }


        $this->onePic = mysqli_fetch_array($result);
	
        db_get::NUKE_CXN($con);
	}	
	


	
	public static function get_all_records()
	{
        $con = db_get::get_connection();

		$query = "SELECT * FROM show_pics";
        $result = db_get::QUERY($con, $query);

        while($row = mysqli_fetch_array($result))
        {
			$this->allPics[] = $row;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
	}
    
	public static function get_active_records()
	{
        $con = db_get::get_connection();

		/* check connection */
		if (!$con){ die('Could not connect: ' . mysqli_error());}

		$query = "SELECT * FROM show_pics WHERE activ = 1";
        $result = db_get::QUERY($con, $query);
		
        while($row = mysqli_fetch_array($result))
        {
			$this->allPics[] = $row;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
	}
	
}
	
?>