<?php
/*
        __                        ________        
_____ _/  |_  _____   ____   ____ \_____  \______ 
\__  \    __\/     \ /  _ \ /    \  _(__  <_  __ \
 / __ \|  | |  Y Y  (  <_> )   |  \/       \  | \/
(____  /__| |__|_|  /\____/|___|  /______  /__|   
     \/           \/            \/       \/    
Website:  http://atmoner.com/
Contact:  contact@atmoner.com     
          
*/

$getThemes = $startUp->getThemes('themes');

if (isset($_GET['theme'])) {
	if (in_array($_GET['theme'], $getThemes)) { 
			$db->query("UPDATE settings SET `value` = '".$db->escape($_GET['theme'])."' WHERE `settings`.`key` = 'theme'");		
			$startUp->redirect($conf['baseurl'].'/admincp/themes/?tokenAdmin='.$_COOKIE['tokenAdmin']);	
	}
}

$smarty->assign("getThemes",$getThemes);

