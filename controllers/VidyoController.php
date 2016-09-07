<?php
use Framework\AbstractController;

require_once(__DIR__."/../../../library/pid.inc");
require_once(__DIR__."/../../../library/formatting.inc.php");
require_once(__DIR__."/../../../library/patient.inc");
require_once(__DIR__."/../../../library/user.inc");

class VidyoController extends AbstractController
{
    public function getTitle()
    {
        return xl("Vidyo");
    }

    public function _action_index()
    {
        $portalUri = $this->request->getParam( 'portalUri' );
        $roomKey = $this->request->getParam( 'roomKey' );
        $pin = $this->request->getParam( 'pin' );
        $appointmentId = $this->request->getParam( 'appointmentId' );
        $userId = $this->request->getParam( 'userId' );
        $pid = $this->request->getParam( 'pid' );

        $settings = vu2vu_getUserSettings( $_SESSION['authUserID'] );
        $user = getUserIDInfo( $_SESSION['authUserID'] );

        $vidyo = new stdClass();
        $vidyo->soapProxy = $GLOBALS["webroot"].'/interface/vidyo/views/vidyo/soap-proxy/server/soap_proxy.php';
        //$vidyo->portalAddress = "http://openemr.test.vu2vu.com/flex.html?roomdirect.html&key=ZlVHJr4DgBkyiGXH21cUSFx3cZs";
        $vidyo->portalUri = "{$settings['vu2vu_portal_url']}/flex.html?roomdirect.html&key=$roomKey";
        $vidyo->username = ""; //$settings['vu2vu_username'];
        $vidyo->password = ""; //$settings['vu2vu_password'];
        $vidyo->guestName = $user['fname']." ".$user['lname'];
        $vidyo->roomPin = $pin;
        $vidyo->encoded = "1";
        $vidyo->useSignIn = "0";

        print_r( $vidyo );

        $this->view->vidyo = $vidyo;
        $this->setViewScript( 'vidyo/www/index.php' );
    }
}