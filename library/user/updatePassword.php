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
}

include "display.php";
display_header();

// Disables the local cache; Use during development. 
// Should be turned OFF for production otherwise might impact performance
ini_set("soap.wsdl_cache_enabled", "0"); 

// Create the Soap Client
$client = new SoapClient("http://$vidyoportal/services/v1_1/v1_1/VidyoPortalUserService?wsdl", 
						 array('login' => $username,
							   'password' => $password,
							   'trace' => 1, 
							   'exceptions' => 1,
							   'soap_version' => SOAP_1_2))
	or exit("Unable to create soap client!");

// prepare update password
if( $password = $_GET['password'] ) {
	$updatePasswordParam = array('password' => $password);
	try {
		$updatePasswordResult = $client->updatePassword($updatePasswordParam);
		$updatePasswordResult = $updatePasswordResult->OK;
		echo "Update Password result is $updatePasswordResult<br><br>";
	} catch (SoapFault $e){
		echo "SoapFault: " . $e->getMessage() . "<br><br>";
	}
}


// For debugging purposes, print the last SOAP Request and Response
if ($debug == 1) {
        soap_debugprint($client);
}
?>

<a href=form_logIn.php> Please Log In Again. </a><br>

<?
display_footer();
?>
