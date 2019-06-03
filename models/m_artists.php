<?php

require_once('config/mysql_stuff.php');

class m_artists
{
    public static $id;
    public $title;
    public $subtitle;
    public $body;
    public $activ;
    public $rank;
    public $stage;
    
	public static $pageData;
	
	public static $page;
	
	public function __construct($page)
	{
		echo "page: ".$page;
		$this->page = $page;
		$this->index();
	}

    public function index()
	{
		switch($this->page)
		{
			case "contactus":
				//	code to be executed if n=label3;
				break;
				
			case "jumpstart":
				break;
				
			case "rentals":
				//	code to be executed if n=label1;
				break;
				
			case "sponsors":
				//	code to be executed if n=label2;
				break;
				
			case "wordplay":
				//	code to be executed if n=label3;
				break;

			case "workshops":
		
				$con = db_get::get_connection();
				
				$query = "SELECT * FROM staticpages WHERE page = ".$this->page;

				$result = db_get::QUERY($con, $query);

				self::$pageData = mysqli_fetch_array($result);
				
				print_r(self::$pageData);
				
				db_get::NUKE_CXN($con);
				
				break;

				
			default:
				//	code to be executed if n is different from all labels;
				break;
		}

	}	
	
    public static function get_page($page)
	{
		$con = db_get::get_connection();
		
		$query = "SELECT * FROM people WHERE page = '" . $page . "'";
				
        $result = db_get::QUERY($con, $query);

        self::$pageData = mysqli_fetch_array($result);

	//	print_r(self::$pageData);
		
        db_get::NUKE_CXN($con);
	}	
    

}

?>