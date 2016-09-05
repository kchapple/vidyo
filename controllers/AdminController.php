<?php
use Framework\AbstractController;

require_once(__DIR__."/../../../library/pid.inc");
require_once(__DIR__."/../../../library/formatting.inc.php");
require_once(__DIR__."/../../../library/patient.inc");

class AdminController extends AbstractController
{
    public function getTitle()
    {
        return xl("Vidyo Admin");
    }

    public function _action_index()
    {
        $this->setViewScript( 'admin/index.php' );
    }
}