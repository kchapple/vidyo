<?
include "display.php";

if (!session_is_registered('id')) 
{

	session_start(); 
	$username = $_GET['username'];
	$password = $_GET['password'];
	$debug = $_GET['debug'];
	$vidyoportal = $_GET['vidyoportal'];

	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['debug']=$debug;
	$_SESSION['vidyoportal']=$vidyoportal;
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
// prepare logIn
try {
	$logInResult = $client->logIn($signInParam);
	$pak = $logInResult->pak;
	$vm = $logInResult->vmaddress;
	$proxy = $logInResult->proxyaddress;
	echo "LogIn Successful.<br>
	       Portal Access Key (PAK) is $pak <br>
		Proxy is $proxy<br>
		VM is $vm<br><br>";
} catch (SoapFault $e){
	echo "SoapFault: " . $e->getMessage() . "<br><br>";
}

//Change this FQDN and path accroding to your env.
// Send un, pak, vm, vp details to VidyoDesktop
$url = "http://stunusa.vidyo.com/ws/user/SetEid.php";
$vp = "http://$vidyoportal/services";

// echo "<img src='http://127.0.0.1:63457/dummy?url=$url?vm=$vm&un=$username&pak=$pak&portal=$vp&proxy=$proxy&showdialpad=yes&showstartmeeting=yes&&loctag=Default>";
echo "<img src='http://127.0.0.1:63457/dummy?url=$url?vm=$vm&un=$username&pak=$pak&portal=$vp&proxy=$proxy&showdialpad=yes&showstartmeeting=yes&loctag=Default>";
// echo "<img src='http://127.0.0.1:63457/dummy?url=$url?vm=$vm&un=$username&pak=$pak&portal=$vp&proxy=$proxy&loctag=Default>";


// For debugging purposes, print the last SOAP Request and Response
soap_debugprint($client);

?>
<a href=linkEndpoint.php>Link Member with Endpoint</a><br>
<br>
<?
display_footer();
?>
