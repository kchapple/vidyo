<h2>getMembers API</h2>

<form name="input" action="SOAPfile.php" method="get">
    <table>
        <tr>
            <td>start</td>
            <td><input type="text" name="start" /></td>
        </tr>
        <tr>
            <td>limit</td>
            <td><input type="text" name="limit" /></td>
        </tr>
        <tr>
            <td>sortBy</td>
            <td><input type="text" name="sortBy" /></td>
        </tr>
        <tr>
            <td>dir</td>
            <td><input type="text" name="dir" /></td>
        </tr>
        <tr>
            <td>query</td>
            <td><input type="text" name="query" /></td>
        </tr>
    </table>
    <input type="submit" value="getMembers" />
</form>
<br><br>


<?php
/**
 * Created by PhpStorm.
 * User: growlingflea
 * Date: 11/11/15
 * Time: 10:29 PM
 */

//include "display.php";
display_header();

// Disables the local cache; Use during development.
// Should be turned OFF for production otherwise might impact performance
ini_set("soap.wsdl_cache_enabled", "0");


$username = 'openemradmin';
$password = 'emrproof!';


// Create the Soap Client
$client = new SoapClient("http://$vidyoportal/services/v1_1/VidyoPortalAdminService?wsdl",
    array('login' => $username,
        'password' => $password,
        'trace' => 1,
        'exceptions' => 1,
        'soap_version' => SOAP_1_2,
        'features' => SOAP_SINGLE_ELEMENT_ARRAYS))

or exit("Unable to create soap client!");

// prepare get member
$filter = array();
if( $start = $_GET['start'] ) $filter['start'] = $start;
if( $limit = $_GET['limit'] ) $filter['limit'] = $limit;
if( $sortBy = $_GET['sortBy'] ) $filter['sortBy'] = $sortBy;
if( $dir = $_GET['dir'] ) $filter['dir']= $dir;
if( $query = $_GET['query'] ) $filter['query'] = $query;

$getMembersParam = array('Filter' => $filter);
try {
    $getMembersParamResult = $client->getMembers($getMembersParam);
    echo "The number of searched entities is $getMembersParamResult->total<br><br>";

    foreach ($getMembersParamResult->member as $member){
        echo "memberID is $member->memberID<br>";
        echo "name is $member->name<br>";
        echo "password is $member->password<br>";
        echo "displayName is $member->displayName<br>";
        echo "extension is $member->extension<br>";
        echo "Language is $member->Language<br>";
        echo "RoleName is $member->RoleName<br>";
        echo "groupName is $member->groupName<br>";
        echo "proxyName is $member->proxyName<br>";
        echo "emailAddress is $member->emailAddress<br>";
        echo "created is $member->created<br>";
        echo "description is $member->description<br>";
        echo "allowCallDirect is $member->allowCallDirect<br>";
        echo "allowPersonalMeeting is $member->allowPersonalMeeting<br>";
        echo "locationTag is $member->locationTag<br>";
        echo "<br>";
    }

} catch (SoapFault $e){
    echo "SoapFault: " . $e->getMessage() . "<br><br>";
}

// For debugging purposes, print the last SOAP Request and Response
if ($debug == 1) {
    soap_debugprint($client);
}

display_footer();
?>

