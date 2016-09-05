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

// prepare pauseRecording
$pauseRecordingParam = array();

$conferenceID = $_GET['conferenceID'];
$pauseRecordingParam['conferenceID'] = $conferenceID;
$recorderID = $_GET['recorderID'];
$pauseRecordingParam['recorderID'] = $recorderID;

if( $moderatorPIN = $_GET['moderatorPIN'] )
	$pauseRecordingParam['moderatorPIN'] = $moderatorPIN;

try {
	$pauseRecordingResult = $client->pauseRecording($pauseRecordingParam);
	if ($pauseRecordingResult->OK)
	    echo "Recording paused successfully<br><br>";
	
} catch (SoapFault $e){
	echo "SoapFault: " . $e->getMessage() . "<br><br>";
}

// For debugging purposes, print the last SOAP Request and Response
if ($debug == 1) {
        soap_debugprint($client);
}

display_footer();
?>