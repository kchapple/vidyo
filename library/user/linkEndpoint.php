<?
include "display.php";

if (!session_is_registered('id')) 
{
	session_register('id');
	$EId = $_SESSION['id'];

	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$debug=$_SESSION['debug'];
	$vidyoportal=$_SESSION['vidyoportal'];
}
display_header();

// Disables the local cache; Use during development. 
// Should be turned OFF for production otherwise might impact performance
ini_set("soap.wsdl_cache_enabled", "0"); 


// Create the Soap Client
$client = new SoapClient("http://$vidyoportal/services/v1_1/VidyoPortalUserService?wsdl", 
						 array('login' => $username,
							   'password' => $password,
							   'trace' => 1, 
							   'exceptions' => 1,
							   'soap_version' => SOAP_1_2))
	or exit("Unable to create soap client!");

// prepare LinkEP
echo "Endpoint Id is $EId<br><br>";

$requestParam = array('EID' => $_SESSION['id']);
try {
	$linkEndpointResult = $client->linkEndpoint($requestParam);
	$entityId = $linkEndpointResult->Entity->entityID;
	$_SESSION['entityId']=$entityId;

	echo "Link Endpoint Successful.<br>
		  Entity ID is $entityId <br><br>";
} catch (SoapFault $e){
	echo "SoapFault: " . $e->getMessage() . "<br><br>";
}


// For debugging purposes, print the last SOAP Request and Response
if ($debug == 1) {
        soap_debugprint($client);
}
?>
<br>
<a href=form_generateAuthToken.php>Generate Authentication Token</a>
<br>
<?
display_footer();
?>
