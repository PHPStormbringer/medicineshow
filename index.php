<?php



/*
2012/04/21	VAV		Adding code to get static html if exists
2012/06/06	VAV		Default schedule based on db
2012/06/29	VAV		Have to null out pathname before we do next iteration
2012-10-24	VAV		Get all pic records, not just one
2013-03-07	VAV		Need to know stage on production.tpl

2015-12-12	VAV		Changing the way show dates are calculated and passed to front end.  
					I am now passing an array that always starts on Monday, 
					and has an element for each day of the week for the entirety of the run of the show.
*/

$ACTION = explode("/", substr($_SERVER['REQUEST_URI'],1));

if($ACTION[1])
{
    $webpage = $ACTION[1];
}
else{$webpage = "home"; }

//elseif (){}/*whatever the cases for the live site, set $webpage*/

switch($webpage)
{
	case 'admin':

		header("Location: ../medshow_admin/main/productions");
		break;
	
	case 'aboutus':
		
	//	$page_class = "about_us";
	//	$page_title = "About Us";
		
		require_once('models/m_aboutus.php');		
		m_aboutus::get_page();
		
		require_once('views/v_aboutus.php');		
		new v_aboutus(m_aboutus::$pageData);
				
		break;
	
	case 'angels':
		require_once('models/angels.php');
		$arr_ALL_Active = angels::get_active_records();
		
		require_once('views/v_angels.php');		
		$Gabriel = new v_angels($arr_ALL_Active);
		
		break;

	case 'artists':
				
		$webpage = $_GET['name'];
		require_once('models/m_artists.php');
		m_artists::get_page($webpage);
				
		require_once('views/v_artists.php');	
		new v_artists(m_artists::$pageData);
		
		break;
		
	case 'contactus';
	
	//	$smarty->assign('page_class', 'contact_us');
	//	$smarty->assign('Page_Title', 'Contact Us');
	//	$smarty->display('contactus.tpl');
		
		require_once('models/m_contactus.php');
		m_contactus::get_page();

		require_once('views/v_contactus.php');	
		new v_contactus(m_contactus::$pageData);
		
		break;
		
	case 'home':

		require_once('models/m_home.php');		
		m_home::get_all_records();

	//	print_r(m_home::$allBlocs);
		
		require_once('models/m_productions.php');
		m_productions::get_active_records();
		
		require_once('models/m_jumpstart.php');
		m_jumpstart::get_active_records();

		
		require_once('views/v_home.php');		
		new v_home(m_productions::$allShows,m_jumpstart::$allShows,m_home::$allBlocs);
		
		break;



	case 'history':
		
		require_once('models/m_productions.php');
		m_productions::get_all_mainstage_records();
		
	//	print_r(m_productions::$allShows);
		
		require_once('views/v_history.php');		
		new v_history(m_productions::$allShows);
		
		break;

	case 'jumpstart';
		
		require_once('models/m_jumpstart.php');
		m_jumpstart::get_all_records();
		
	//	print_r(m_jumpstart::$allShows);
		
		require_once('views/v_jumpstart.php');		
		new v_jumpstart(m_jumpstart::$allShows);
				
		break;

		
		break;
		
	case 'production':
		
		require_once('models/m_productions.php');
		m_productions::get_one_record_by_id();
		
		require_once('views/v_production.php');		
		new v_production(m_productions::$oneShow);
		
		break;
				
	case 'rentals';
		
		require_once('models/m_staticpages.php');
		m_staticpages::get_page($webpage);
		
		require_once('views/v_rentals.php');		
		new v_rentals(m_staticpages::$pageData);

		break;

	case 'sponsors';

		require_once('models/m_sponsors.php');
		$arr_ALL_Active = m_sponsors::get_active_records();
		
		require_once('views/v_sponsors.php');		
		$Gabriel = new v_sponsors($arr_ALL_Active);
		
		break;
		
	case 'workshops':
	case 'wordplay':
	default:
		require_once('models/m_staticpages.php');
		m_staticpages::get_page($webpage);
		
		require_once('views/v_'.$webpage.'.php');	
		$v_page = "v_".$webpage;
		
		new $v_page(m_staticpages::$pageData);
		
		break;

/*				
		
	case 'news':
		
	//	$smarty->assign('page_class', 'news');			
	//	$smarty->assign('htmlfile', 'bodywork/' . $showshortname);
		break;
		
	case 'ourcds';
	//	$smarty->assign('page_class', 'our_cds');
	//	$smarty->assign('Page_Title', 'Our CDs');
		break;
		
	case 'home':
	default:
	//	$smarty->display('home.tpl');
		break;	
*/
}


?>


