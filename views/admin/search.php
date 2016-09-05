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
        'query' => '111',
        'limit'  => 10
    );

    $searchParam = array('Filter' => $filter);
    $result      = $client->search($searchParam);
    echo "<pre>" . print_r($result, true) . "</pre>";
?>
