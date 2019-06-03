<?php
// **********************************************************************************************************
// name: m_sponsors.php
// date: 11 oct 2016
// auth:  vvenning
//
// Proj: Medicine Show Modernization
// **********************************************************************************************************
// SELECT, INSERT, UPDATE, DELETE functions for productions MySQL table 
// **********************************************************************************************************

require_once('config/mysql_stuff.php');

class m_sponsors
{
    public $uid;
    public $name;
    public $desc;
    public $actv;
    public $rank;
	
	public static $str_TableName = "sponsors";
	private $str_Database  = "xptheater";
    
	public static function get_column_names()
	{
	    $con = db_get::get_connection();

        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$this->$strTableName."' AND table_schema = '".$this->$strDatabase."'";

        $result = db_get::QUERY($con, $query);
	
        $i = 0;
	
        while($row = mysqli_fetch_array($result))
        {
            $arrColNames[$i] = $row[0];
		
            $i++;
        }
	
        mysqli_free_result($result);
	
        db_get::NUKE_CXN($con);
		
		return $arrColNames;

	}
	
    public static function get_one_record_by_id($int_pid)
	{
        $con = db_get::get_connection();
	
        $query = "SELECT * FROM $this->str_TableName WHERE uid = $int_pid";

        $result = db_get::QUERY($con, $query);

        $i = 0;

        $row = mysqli_fetch_array($result);
	
        db_get::NUKE_CXN($con);
		
		return $row;
	}	
    
	
    public static function get_last_record()
	{
        $con = db_get::get_connection();
	
        $query = "SELECT * FROM `sponsors` order by uid desc limit 1";

        $result = db_get::QUERY($con, $query);

        $i = 0;

        $row = mysqli_fetch_array($result);
	
        db_get::NUKE_CXN($con);
		
		return $row;
	}	
    
	public static function get_all_records()
	{
        $con = db_get::get_connection();

        $result = db_get::QUERY($con, "SELECT * FROM $this->str_TableName");

        $i = 0;

        while($row = mysqli_fetch_array($result))
        {
            $arr_biz_start[$i] = $row;
   
            $i++;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
		
		return $arr_biz_start;	
	}

    
	public static function get_active_records()
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

        $result = db_get::QUERY($con, "SELECT * FROM `sponsors` WHERE actv = 1 ORDER BY rank");

		
        $i = 0;

        while($row = mysqli_fetch_array($result))
        {
            $arr_Active_Records[$i] = $row;
   
            $i++;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
		
		return $arr_Active_Records;	
	}


	public static function fromArray($data, $class = __CLASS__)
	{
		$angels = new sponsors();
		
		$angels->name = $data['name'];
		$angels->desc = $data['desc'];
		$angels->actv = $data['actv'];
		$angels->rank = $data['rank'];
		
        return $production;	
	}
	
	public static function insert_record(sponsors $cherub)
	{
        $con = db_get::get_connection();
        	
		$query = "INSERT INTO `sponsors` (name, desc, actv, rank) VALUES ('".$cherub->name."','".$cherub->desc."','".$cherub->actv."',".$cherub->rank."')";
											   
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}

	public static function update_record(angels $cherub)
	{
        $con = db_get::get_connection();
        $query = "UPDATE `sponsors` SET name = '$cherub->name', desc = '$cherub->desc', actv = '$cherub->actv', rank = '$cherub->rank' WHERE uid = '$cherub->uid'";
		
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}	

	public static function delete_record($int_pid)
	{
        $con = db_get::get_connection();
        
		$query = "DELETE FROM `sponsors` WHERE uid = $int_pid";
											   
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}

}

?>