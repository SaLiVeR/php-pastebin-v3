<?php
/////////////////////////////////////////////////////////////////////////
//
//    This file is part of edit.account.php
//
//    Foobar is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    Foobar is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
//
/////////////////////////////////////////////////////////////////////////
//
// Website : http://php-pastebin.com/
// Contact : contact@php-pastebin.com
// 
/////////////////////////////////////////////////////////////////////////
//
// Dev     : Atmoner
// Website : http://atmoner.com
// Contact : contact@atmoner.com
// Twitter : @atmon3r 
// 
/////////////////////////////////////////////////////////////////////////


if (!defined("IN_PASTE"))
      die("Access denied!");

$startUp->isLoggedAcount(); 

if (isset($_POST['submit'])) {
	if (!empty($_POST['mail'])) {
		if ($startUp->checkMail($_POST['mail'])) {
			$startUp->EditUserInfo('',$_POST['mail'],$_POST['showMail'],$_POST['location'],$_POST['website'],$_POST['signature']);		
			$smarty->assign("errormail",false);	
			$smarty->assign("syntaxmail",false);	
			
		} else
			$smarty->assign("syntaxmail",true);	

	} else 
		$smarty->assign("errormail",true);	
} 
		
 	
$getUserdata = $startUp->getUserdata();
$smarty->assign("getUserdata",$getUserdata);
$smarty->assign("getGravatar",$startUp->get_gravatar($getUserdata->mail));

$hook->set_title('title_editaccount', $lang["titleEdit"]); 

