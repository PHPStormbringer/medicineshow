<?php

require_once('config/mysql_stuff.php');

class m_pages
{
    public static $id;
    public $title;
    public $subtitle;
    public $body;
    public $activ;
    public $rank;
    public $stage;
    
	public static $pageData;
		
    public static function get_page_by_title($page)
	{
		$con = db_get::get_connection();
		
		$query = "SELECT * FROM pages WHERE page = '$page'";

        $result = db_get::QUERY($con, $query);

        self::$pageData = mysqli_fetch_array($result);
		
        db_get::NUKE_CXN($con);
	}	
    

}

?>