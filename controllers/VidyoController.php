<?php
use Framework\AbstractController;

require_once(__DIR__."/../../../library/pid.inc");
require_once(__DIR__."/../../../library/formatting.inc.php");
require_once(__DIR__."/../../../library/patient.inc");

class VidyoController extends AbstractController
{
    public function getTitle()
    {
        return xl("Vidyo");
    }

    public function _action_index()
    {
        $vidyo = new stdClass();
        $vidyo->soapProxy = $GLOBALS["webroot"].'/interface/vidyo/views/vidyo/soap-proxy/server/soap_proxy.php';
        $vidyo->portalAddress = "https://vircon.vu2vu.com";// /flex.html?roomdirect.html&key=90W4vdp7207rpLTe8tzCktS4sM";
        $vidyo->username = "Ken.Chapple";
        $vidyo->password = "vircon3";
        $vidyo->portalUri = "";
        $vidyo->guestName = "";
        $vidyo->roomPin = "";
        $vidyo->encoded = "1";
        $vidyo->useSignIn = "0";

        $this->view->vidyo = $vidyo;
        $this->setViewScript( 'vidyo/www/index.php' );
    }
}