<?php

require_once('config/mysql_stuff.php');

class m_aboutus
{
    public static $id;
    public $title;
    public $subtitle;
    public $body;
    public $activ;
    public $rank;
    public $stage;
    
	public static $pageData;
		
    public static function get_page()
	{
		$con = db_get::get_connection();
		
		$query = "SELECT * FROM aboutus";

        $result = db_get::QUERY($con, $query);

        self::$pageData = mysqli_fetch_array($result);
		
        db_get::NUKE_CXN($con);
	}	
    

}

?>