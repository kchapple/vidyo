<?php
    $vu2vuAdminWSDL = 'http://openemr.test.vu2vu.com/services/v1_1/VidyoPortalAdminService?wsdl';

    $client         = new SoapClient($vu2vuAdminWSDL, array(
        'login' => 'openemradmin',
        'password' => 'emrproof!',
        'trace' => TRUE,
        'soap_version' => SOAP_1_2,
        'features' => SOAP_SINGLE_ELEMENT_ARRAYS
    ));

    $filter = array(
        'query' => '34-5-2016-03-01-14:40:00'
    );

    $searchParam = array('Filter' => $filter);
    $result      = $client->getRooms($searchParam);
    echo "<pre>" . $result->room[0]->RoomMode->roomURL . "</pre>";
    echo "<HR>";
    echo "<pre>" . print_r($result, true) . "</pre>";
?>
