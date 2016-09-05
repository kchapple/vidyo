<?

//Create the client object parameters

$username = 'openemradmin';
$password = 'emrproof!';

$params = array('login' => $username,
    'password' => $password,
    'trace' => 1,
    'exceptions' => 1,
    'soap_version' => SOAP_1_2);

$wdsl = 'http://openemr.test.vu2vu.com/services/v1_1/VidyoPortalAdminService?wsdl';


//Create the client object
$client = new SoapClient($wdsl, $params) or exit("unable to create soap client");

// prepare get LocationTags
$filter = array();
if( $start = $_GET['start'] ) $filter['start'] = $start;
if( $limit = $_GET['limit'] ) $filter['limit'] = $limit;
if( $sortBy = $_GET['sortBy'] ) $filter['sortBy'] = $sortBy;
if( $dir = $_GET['dir'] ) $filter['dir']= $dir;
if( $query = $_GET['query'] ) $filter['query'] = $query;

$getLocationTagsParam = array('Filter' => $filter);
try {
	$getLocationTagsParamResult = $client->getLocationTags($getLocationTagsParam);
	echo "The number of searched entities is $getLocationTagsParamResult->total<br><br>";
	if ($getLocationTagsParamResult->total > 0){
 	   foreach ($getLocationTagsParamResult->location as $location){
		    echo " <br> location: $location->locationTag <br>";
	   }
	   echo "<br>";
	}
	
} catch (SoapFault $e){
	echo "SoapFault GET LOCATION: " . $e->getMessage() . "<br><br>";
}

// For debugging purposes, print the last SOAP Request and Response
if ($debug == 1) {
        soap_debugprint($client);
}


?>
