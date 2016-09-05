<?
if (!session_is_registered('id')) 
{
	session_register('id');
	$EId = $_SESSION['id'];

	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$debug=$_SESSION['debug'];
	$entityId = $_SESSION['entityId'];
	$vidyoportal = $_SESSION['vidyoportal'];

    $authToken = $_SESSION['authToken'];
}

include "display.php";
display_header();

// Disables the local cache; Use during development. 
// Should be turned OFF for production otherwise might impact performance
ini_set("soap.wsdl_cache_enabled", "0"); 

// Create the Soap Client
if ($authToken){
        echo "Using Authentication token<br>$authToken<br><br>";
        $client = new SoapClient("http://$vidyoportal/services/v1_1/VidyoPortalUserService?wsdl", 
                                 array('login' => $EId,
                                       'password' => $authToken,
                                       'trace' => 1, 
                                       'exceptions' => 1,
                                       'soap_version' => SOAP_1_2,
                                                                   'features' => SOAP_SINGLE_ELEMENT_ARRAYS))
                  or exit("Unable to create soap client!");
}else{
    
    echo "Using Username/Password<br><br>";
    $client = new SoapClient("http://$vidyoportal/services/v1_1/VidyoPortalUserService?wsdl", 
                             array('login' => $username,
                                   'password' => $password,
                                   'trace' => 1, 
                                   'exceptions' => 1,
                                   'soap_version' => SOAP_1_2,
                                                               'features' => SOAP_SINGLE_ELEMENT_ARRAYS))
              or exit("Unable to create soap client!");
}

// prepare My Account
try {
	$myAccountResult = $client->myAccount($myAccountParam);
	$entity = $myAccountResult->Entity;

	echo "<b>My Account Information:</b><br>";
	echo "entityID is $entity->entityID<br>";
	echo "participantID is $entity->participantID<br>";
	echo "EntityType is $entity->EntityType<br>";
	echo "displayName is $entity->displayName<br>";
	echo "extension is $entity->extension<br>";
	echo "description is $entity->description<br>";
	echo "Language is $entity->Language<br>";
	echo "MemberStatus is $entity->MemberStatus<br>";
	echo "MemberMode is $entity->MemberMode<br>";
	echo "canCallDirect is $entity->canCallDirect<br>";
	echo "canJoinMeeting is $entity->canJoinMeeting<br>";
	echo "RoomStatus is $entity->RoomStatus<br>";
	$erm = $entity->RoomMode;
	echo "RoomMode: RoomURL is $erm->roomURL, isLocked is $erm->isLocked, hasPin is $erm->hasPin, roomPIN is $erm->roomPIN<br>";
	echo "canControl is $entity->canControl<br>";
	echo "audio is $entity->audio<br>";
	echo "video is $entity->video<br>";
	echo "appshare is $entity->appshare<br><br>";
} catch (SoapFault $e) {
	echo "SoapFault: " . $e->getMessage() . "<br><br>";
}


// For debugging purposes, print the last SOAP Request and Response
if ($debug == 1) {
        soap_debugprint($client);
}

display_footer();
?>
