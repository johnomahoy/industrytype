<?php
require_once("isdk.php");	
$app = new iSDK;

if( $app->cfgCon("aa478")){  
	//Get the data
	$contactId = $_REQUEST['contactId'];
	$IndustryTypeTemp = $_REQUEST['IndustryTypeTemp'];
	$IndustryTypeListbox = $_REQUEST['IndustryTypeListbox'];

	//Get CompanyID
	$returnFields = array('CompanyID');
	$conDat = $app->dsLoad("Contact", $contactId, $returnFields);
	foreach($conDat as $vall){
		echo $vall."<br>";
	} 

	//Insert into Company data from the Contact
	$returnFields = array('_IndTypeTemp');
	$conDat = $app->dsLoad("Contact", $contactId, $returnFields);
	
	$newvalue1 = implode(',',$conDat); 
	echo $newvalue1."<br>"; 
	
	$grp = array("_IndustryType" => $newvalue1);  
	$grpID = $app->dsUpdate("Company",$vall,$grp);  
	echo $grpID."Id for company<br>";
	
	 
	$returnFields = array('_IndTypeTemp');
	$conDat = $app->dsLoad("Contact", $contactId, $returnFields);
	$newvalue21 = implode(',',$conDat); 
	echo $newvalue21."the data<br>";
	
	
	//	 insert into industry type contact
	$grp = array("_IndustryType" => $newvalue21); 
	$grpID = $app->dsUpdate("Contact",$contactId,$grp);
	echo $grpID." id for contact<br>";
}    
?>
 
