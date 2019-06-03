<?php

require_once('config/mysql_stuff.php');

class m_contactus
{
    public static $id;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $facebook;
    public $twitter;
    
	public static $pageData;
		
    public static function get_page()
	{
		$con = db_get::get_connection();
		
		$query = "SELECT * FROM contact WHERE id = '1'";

        $result = db_get::QUERY($con, $query);

        self::$pageData = mysqli_fetch_array($result);
		
        db_get::NUKE_CXN($con);
	}	
    

}

?>