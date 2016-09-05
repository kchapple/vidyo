<?
if (!session_is_registered('id')) 
{
	session_register('id');
	$EId = $_SESSION['id'];

	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$debug=$_SESSION['debug'];
	$entityId = $_SESSION['entityId'];
	$vidyoportal=$_SESSION['vidyoportal'];

    $authToken = $_SESSION['authToken'];
}

include "display.php";
display_header();

// Disables the local cache; Use during development. 
// Should be turned OFF for production otherwise might impact performance
ini_set("soap.wsdl_cache_enabled", "0"); 

// Create the Soap Client
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

// prepare Get Participants
if ( $conferenceID = $_GET['conferenceID'] ) {
	$filter = array();
	if( $start = $_GET['start'] ) $filter['start'] = $start;
	if( $limit = $_GET['limit'] ) $filter['limit'] = $limit;
	if( $sortBy = $_GET['sortBy'] ) $filter['sortBy'] = $sortBy;
	if( $dir = $_GET['dir'] ) $filter['dir']= $dir;
	if( $query = $_GET['query'] ) $filter['query'] = $query;

	$getParticipantsParam = array('conferenceID' => $conferenceID, 'Filter' => $filter);
	try {
		$getParticipantsResult = $client->getParticipants($getParticipantsParam);
		echo "The number of participants is $getParticipantsResult->total<br><br>";

		if($getParticipantsResult->recorderID){
	           echo "recorderID is $getParticipantsResult->recorderID<br>";
	           echo "recorderName is $getParticipantsResult->recorderName<br>";
         	   echo "paused is ";
		   if ($getParticipantsResult->paused)
			echo "true<br>";
		   else
			echo "false<br>";
                   echo "webcast is ";
		   if ($getParticipantsResult->webcast)
			echo "true<br>";
		   else
			echo "false<br>";
		}
		echo "<br>";

		if ($getParticipantsResult->total > 0){
		  foreach($getParticipantsResult->Entity as $entity){
              echo "entityID is $entity->entityID<br>";
              echo "participantID is $entity->participantID<br>";
              echo "EntityType is $entity->EntityType<br>";
              echo "displayName is $entity->displayName<br>";
              echo "extension is $entity->extension<br>";
              echo "Language is $entity->Language<br>";
              echo "MemberStatus is $entity->MemberStatus<br>";
              echo "MemberMode is $entity->MemberMode<br>";
              echo "canCallDirect is ";
              if ($entity->canCallDirect)
                  echo "true<br>";
              else
                  echo "false<br>";
              echo "canJoinMeeting is ";
              if ($entity->canJoinMeeting)
                  echo "true <br>";
              else
                  echo "false<br>";
              echo "RoomStatus is $entity->RoomStatus<br>";

              $erm = $entity->RoomMode;
              echo "RoomURL is $erm->roomURL<br>";
              echo "isLocked is ";
              if ($erm->isLocked)
                  echo "true<br>";
              else
                  echo "false<br>";
              echo "hasPin is ";
              if ($erm->hasPIN)
                  echo "true, roomPIN is $erm->roomPIN<br>";
              else
                  echo "false<br>";
              echo "hasModeratorPIN is ";
              if ($erm->hasModeratorPIN)
                  echo "true, moderatorPIN is $erm->moderatorPIN<br>";
              else
                  echo "false<br>";
              echo "canControl is ";
              if ($entity->canControl)
                  echo "true<br>";
              else
                  echo "false<br>";
              echo "audio is ";
              if ($entity->audio)
                  echo "true<br>";
              else
                  echo "false<br>";
              echo "video is ";
              if ($entity->video)
                  echo "true<br>";
              else
                  echo "false<br>";
              echo "appshare is ";
              if ($entity->appshare)
                  echo "true<br>";
              else
                  echo "false<br>";
          }
        }
        echo "<br><br>";
    } catch (SoapFault $e) {
        echo "SoapFault: " . $e->getMessage() . "<br><br>";
    }
}

// For debugging purposes, print the last SOAP Request and Response
if ($debug == 1) {
        soap_debugprint($client);
}

display_footer();
?>
