<?php
// **********************************************************************************************************
// name: m_home.php
// date: 26 sep 2017
// auth:  vvenning
//
// Proj: New MedShow
// **********************************************************************************************************
// SELECT for home MySQL table 
// **********************************************************************************************************

require_once('config/mysql_stuff.php');

class m_home
{
    public static $uid;
    public $name;
    public $body;
    public $actv;
    public $rank;
    public $rightleft;
	
    public static $allBlocs;
	
    public static function get_all_records()
    {
	$con = db_get::get_connection();

	$query = "SELECT * FROM home WHERE actv = 1 ORDER BY rightleft ASC, rank ASC";
	$result = db_get::QUERY($con, $query);

        while($row = mysqli_fetch_array($result))
        {
	     self::$allBlocs[] = $row;
	}

	mysqli_free_result($result);

	db_get::NUKE_CXN($con);
    }
}

?>