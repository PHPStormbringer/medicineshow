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

class m_jumpstart
{
    public static $id;
    public $season;
    public $title;
    public $author;
    public $director;
    public $dates;
    public $notes;

    public static $oneShow;
    public static $allShows;
	
    public function __construct($arrShows)
    {
		echo "page: ".$page;
		$this->page = $page;
		$this->index();
    }

    public static function get_one_record_by_id()
    {
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		self::$id = $_GET['id'];
	}
		
	$con = db_get::get_connection();
		
	if(self::$pid){ $query = "SELECT * FROM jumpstart_detail WHERE id = " . self::$pid; }
	else { $query = "SELECT * FROM jumpstart ORDER BY id DESC LIMIT 1"; }

        $result = db_get::QUERY($con, $query);

        $i = 0;

        self::$oneShow = mysqli_fetch_array($result);
	
        db_get::NUKE_CXN($con);
    }	
	
    public static function get_all_records()
    {
        $con = db_get::get_connection();

	$query = "SELECT * FROM jumpstart_detail ORDER BY season_id DESC, rank ASC";
        $result = db_get::QUERY($con, $query);

        while($row = mysqli_fetch_array($result))
        {
			self::$allShows[] = $row;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
    }
    
    public static function get_active_records()
    {
        $con = db_get::get_connection();

		/* check connection */
		if (!$con){ die('Could not connect: ' . mysqli_error());}

		$query = "SELECT * FROM jumpstart_detail WHERE activ = 1";
        $result = db_get::QUERY($con, $query);
		
        while($row = mysqli_fetch_array($result))
        {
			self::$allShows[] = $row;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
    }
	
    public static function get_records_by_season()
    {
        $con = db_get::get_connection();

		$query = "SELECT * FROM jumpstart_detail WHERE season = '$this->season'";
        $result = db_get::QUERY($con, $query);

        while($row = mysqli_fetch_array($result))
        {
			self::$allShows[] = $row;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
    }
    
}
	
?>