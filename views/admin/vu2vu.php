<?php
/**
 * Created by
 * User: tony
 * Date: 2/15/16
 * Time: 2:40 PM
 * LICENSE: This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://opensource.org/licenses/gpl-license.php>;.
 *
 * @package {openemr-ce}
 * @author  Tony McCormick <tony@mi-squared.com>
 */

require_once('./vu2vuSOAP.php');

const CONNECTION ="connection string here";

$vu2vuSOAP = new vu2vusoap();

$vu2vuSOAP->setFromGlobals(CONNECTION)->initializeSoapClient();

$vu2vuResponse = $vu2vuSOAP->submitSingleMessage($content);

$response = explode("|", $vu2vuResponse->return);
$capture = $response[14];

if (strpos($capture, "message received") !== false)
{
    $success++;
    // DO STUFF

} else {

    $failures++;
    // DO STUFF
}


