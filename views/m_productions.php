<?php
// **********************************************************************************************************
// name: productions.php
// date: 22 feb 2011
// auth:  vvenning
//
// Proj: Casio.com refresh
// **********************************************************************************************************
// SELECT, INSERT, UPDATE, DELETE functions for productions MySQL table 
// **********************************************************************************************************

require_once('config/mysql_stuff.php');

class m_productions
{
    public static $pid;
    public $project;
    public $pathname;
    public $producer;
    public $writer;
    public $director;
    public $musicaldirector;
    public $setdesigner;
    public $sounddesign;
    public $technicaldirector;
    public $masterelectrician;
    public $lightingdesigner;
    public $costumedesigner;
    public $stagemanager;
    public $description;
    public $short_desc;
    public $biz_start;
    public $activ;
    public $rank;
    public $stage;
    
	public static $oneShow;
	public static $allShows;
	
	public static function get_column_names()
	{
	    $con = db_get::get_connection();

        $str_TableName = "productions";
	
        $query = "CALL sp_GetDbColumnNames(\"productions\")";

        $result = db_get::QUERY($con, $query);
	
        $i = 0;
	
        while($row = mysqli_fetch_array($result))
        {
            $arr_coproducers[$i] = $row[0];
		
            $i++;
        }
	
        mysqli_free_result($result);
	
        db_get::NUKE_CXN($con);
		
		return $arr_coproducers;

	}
	
    public static function get_one_record_by_id()
	{
		if (isset($_GET['id']) && is_numeric($_GET['id']))
		{
			self::$pid = $_GET['id'];
		}
		
		$con = db_get::get_connection();
		
		if(self::$pid){ $query = "SELECT * FROM productions WHERE id = " . self::$pid; }
		else { $query = "SELECT * FROM productions ORDER BY id DESC LIMIT 1"; }

        $result = db_get::QUERY($con, $query);

        $i = 0;

        self::$oneShow = mysqli_fetch_array($result);
	
        db_get::NUKE_CXN($con);
	}	
	
	public static function get_all_records()
	{
        $con = db_get::get_connection();

		$query = "SELECT * FROM productions WHERE id";
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

		$query = "SELECT * FROM productions WHERE activ = 1";
        $result = db_get::QUERY($con, $query);
		
        while($row = mysqli_fetch_array($result))
        {
			unset($arrPics);
			
			$query = "SELECT * FROM show_pics WHERE show_id = ".$row[id];
			$resPics = db_get::QUERY($con, $query);
			while($rowPics = mysqli_fetch_array($resPics))
			{
				$arrPics[] = $rowPics;
			}
			$row[pics] = $arrPics;
			
			self::$allShows[] = $row;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
	}
	
    public static function get_last_record()
	{
        $con = db_get::get_connection();
	
        $query = "SELECT * FROM `productions` order by pid desc limit 1";

        $result = db_get::QUERY($con, $query);

        $i = 0;

        $row = mysqli_fetch_array($result);
	
        db_get::NUKE_CXN($con);
		
		return $row;
	}	
    


	public static function get_mainstage_ids_and_names()
	{
        $con = db_get::get_connection();

		/* check connection */
		if (!$con)
		{
			die('Could not connect: ' . mysqli_error());
		}
		else
		{
		//	echo "Have connection will travel";
		}

        $result = db_get::QUERY($con, "SELECT pid, project FROM productions WHERE stage = 1 ORDER BY pid DESC");

		
        $i = 0;

        while($row = mysqli_fetch_array($result))
        {
            $arr_MainStage_Shows[$i] = $row;
   
            $i++;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
		
		return $arr_MainStage_Shows;	
	}



	public static function fromArray($data, $class = __CLASS__)
	{
        $production = new production();
		
        $production->pid     = $data['pid'];
        $production->biz_start   = $data['biz_start'];
        $production->producer   = $data['producer'];
        $production->project = $data['project'];

        return $production;	
	}
	
	public static function insert_record(production $prod)
	{
        $con = db_get::get_connection();
        
		$query = "CALL sp_productionsINSERT(\"" . $prod->project   . "\", \"" .
		                                          $prod->pathname   . "\", \"" .
		                                          $prod->producer   . "\", \"" . 
		                                          $prod->writer   . "\", \"" .
												  $prod->director   . "\", \"" .
												  $prod->musicaldirector   . "\", \"" .
												  $prod->setdesigner   . "\", \"" .
												  $prod->sounddesign   . "\", \"" .
												  $prod->technicaldirector   . "\", \"" .
												  $prod->masterelectrician   . "\", \"" .
												  $prod->lightingdesigner   . "\", \"" .
												  $prod->costumedesigner   . "\", \"" .
												  $prod->stagemanager   . "\", \"" .
												  $prod->description   . "\", \"" .
												  $prod->short_desc   . "\", \"" .
												  $prod->biz_start   . "\", \"" .
												  $prod->activ   . "\", \"" .
												  $prod->rank   . "\", \"" . 
											      $prod->stage . "\")";
											   
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}

	public static function update_record(production $prod)
	{
        $con = db_get::get_connection();
        
		$query = "CALL sp_productionsUPDATE(\"" . $prod->pid   . "\", \"" . 
		                                          $prod->project   . "\", \"" .
												  $prod->pathname   . "\", \"" .
		                                          $prod->producer   . "\", \"" . 
		                                          $prod->writer   . "\", \"" .
												  $prod->director   . "\", \"" .
												  $prod->musicaldirector   . "\", \"" .
												  $prod->setdesigner   . "\", \"" .
												  $prod->sounddesign   . "\", \"" .
												  $prod->technicaldirector   . "\", \"" .
												  $prod->masterelectrician   . "\", \"" .
												  $prod->lightingdesigner   . "\", \"" .
												  $prod->costumedesigner   . "\", \"" .
												  $prod->stagemanager   . "\", \"" .
												  $prod->description   . "\", \"" .
												  $prod->short_desc   . "\", \"" .
												  $prod->biz_start   . "\", \"" .
												  $prod->activ   . "\", \"" .
												  $prod->rank   . "\", \"" . 
											      $prod->stage . "\")";
											   
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}	

	public static function delete_record($int_pid)
	{
        $con = db_get::get_connection();
        
		$query = "CALL sp_productionsDELETE(" . $int_pid   . ")";
											   
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}

}

?>