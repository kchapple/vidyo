<?php
/**
 * Created by
 * User: tony
 * Date: 2/24/16
 * Time: 2:14 PM
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

function vu2vu_getUserSettings( $userId )
{
    $sql = "SELECT * FROM user_settings WHERE setting_user = ?";
    $result = sqlStatement( $sql, [ $userId ] );
    $settings = array();
    while ( $row = sqlFetchArray( $result ) ) {
        $settings[$row['setting_label']] = $row['setting_value'];
    }
    return $settings;
}

function vu2vu_getLogin( $userid )
{
    $login_array = null;
    $settings = vu2vu_getUserSettings( $userid );
    if ( $settings['vu2vu_username'] &&
        $settings['vu2vu_password'] ) {

        // Get logins and WSDL paramaters
        $login_array = array(
            'login' => $settings['vu2vu_username'],
            'password' => $settings['vu2vu_password'],
            'trace' => 1,
            'exceptions' => 1,
            'soap_version' => SOAP_1_2,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS
        );
    } else {
        error_log( "No vu2vu username or password for user id=$userid" );
    }

    return ($login_array);
}

function vu2vu_getWSDL()
{
    return "http://openemr.test.vu2vu.com/services/v1_1/VidyoPortalUserService?wsdl";
    // ($GLOBALS['vu2vu_wsdl_url']);
}

function vu2vu_getTenant()  //Unused at this time
{
    return ($GLOBALS['vu2vu_tenant_url']);
}

function vu2vu_getTenant_ID()
{
    return ($GLOBALS['vu2vu_tenant_id']);
}

function vu2vu_createClient( $wsdl, array $login ) {

    try {
        $client = new SoapClient($wsdl, $login);
        return ($client);
    } catch (SoapFault $e) {
        return (FALSE);  // unable to create client
    }
}

function vu2vu_getMember($client, $memberid = 22) {  // TODO: this default is for TEST of openemradmin ONLY
    $membParam = array('entityID' => $memberid);
    try {
        $member = $client->getMember($membParam);
        return ($member);
    } catch (SoapFault $e) {
        return (FALSE);  // unable to find Member
    }
}

function vu2vu_addRoom($client, $extension, $roomname, $ownername, $description, $groupname='Default', $roomtype='Public' ) {
    $pinParam = array (
        'isLocked' => 0,
        'hasPIN' => 1,
        'hasModeratorPIN' => 0
    );


    $roomParam = array (
        // 'addRoomID' => 0,  // meaningless, gets overridden internally by a autoincrement value
        'name' => $roomname,
        //'RoomType' => $roomtype,
        //'ownerName' => $ownername,
        'extension' => $extension
        //'groupName' => $groupname,
        //'RoomMode' => $pinParam
    );

    // $addroom = array ('room' => $roomParam);
    try {
        $room = $client->createRoom( $roomParam );
        return $room->Entity;
    } catch (SoapFault $e) {
        return (FALSE);
    }
}

function vu2vu_addPinToRoom( $client, $room )
{
    $entityId = $room->entityID;
    $pin = rand( 1000, 9999 );
    $createRoomPINParam = array('roomID' => $entityId, 'PIN' => $pin);
    try {
        $createRoomPINResult = $client->createRoomPIN( $createRoomPINParam );
        $createRoomPINResult = $createRoomPINResult->OK;
        return $pin;
    } catch ( SoapFault $e ){
        return false;
    }
}

// THIS IS ALL ABOUT USING ROOM NAME AS THE PRIMARY
function vu2vu_getRoom_entityId ($client,$roomname) {

    $filter = array('query' => $roomname);
    $searchParam = array ('Filter' => $filter);
    try {
        $roomresult = $client->getRooms($searchParam);
        $entityId = $roomresult->room[0]->RoomMode->entityId;
        return ($entityId);
    } catch (SoapFault $e) {
        return (FALSE);  // unable to find Room
    }
}

function vu2vu_getRoom_url ($client,$roomname) {

    $filter = array('query' => $roomname);
    $searchParam = array ('Filter' => $filter);
    try {
        $roomresult = $client->getRooms($searchParam);
        $url = $roomresult->room[0]->RoomMode->roomURL;
        return ($url);
    } catch (SoapFault $e) {
        return (FALSE);  // unable to find Room
    }
}

function vu2vu_getRoom( $client,$roomname )
{
    $room = false;
    $filter = [
        'query' => $roomname,
        'entityType' => 'Room',
        'limit' => 1
    ];
    $searchParam = [
        'Filter' => $filter,
    ];
    try {
        $rooms = $client->search( $searchParam );
        $room = $rooms->Entity[0];
        if ( $room == null ) {
            $room = false;
        }
    } catch (SoapFault $e) {
        error_log( $e->getMessage() );  // unable to find Room
    }

    return $room;
}

function vu2vu_deleteRoom ($client,$roomname) {
    $roomresult = vu2vu_getRoom ($client,$roomname);
    $roomid = $roomresult->room[0]->roomID;
    $deleteRoomParam = array('roomID' => $roomid);
    try {
        $roomresult = $client->deleteRoom($deleteRoomParam);
        return (TRUE);
    } catch (SoapFault $e) {
        return (FALSE);  // unable to delete room
    }
}

// Functions used to create and retrieve conf room URLs

function vu2vu_check_status( $vu2vu_client, $username, $roomname, $appt_id, $status, $title ) {

    $location = null;

    if ($status === '*') {  //TELEMEDICINE REMINDER

        $room = vu2vu_getRoom( $vu2vu_client, $roomname );
        if ( $room === false ) {
            $myAccountResult = $vu2vu_client->myAccount();
            $entity = $myAccountResult->Entity;
            $myExtension = $entity->extension;
            $newExtension = substr( $myExtension, 0, 4 ).rand( 100, 999 );
            $room = vu2vu_addRoom( $vu2vu_client, $newExtension, $roomname, $username, $title );
            $pin = vu2vu_addPinToRoom( $vu2vu_client, $room );
        }

        if ( $room ) {
            $room_url = $room->RoomMode->roomURL;
            $pin = $room->RoomMode->roomPIN;
            $parse = parse_url( $room_url );
            $portalUri = "{$parse['scheme']}://{$parse['host']}";
            $query = parse_url( $room_url, PHP_URL_QUERY );
            $vars = array();
            parse_str( $query, $vars );
            $roomKey = $vars['key'];
            if ( $portalUri &&
                $roomKey &&
                $pin ) {
                $location = [
                    'portalUri' => $portalUri,
                    'roomKey' => $roomKey,
                    'pin' => $pin
                ];
                $info_msg = $info_msg = "Video URL is:" . $room_url;

                // Store room data in database
                $sql = "UPDATE libreehr_postcalendar_events SET pc_location = ? WHERE pc_eid = ?";
                $result = sqlStatement($sql, [json_encode($location), $appt_id]);
            } else {
                error_log( "Location missing params { portalUri=>$portalUri, roomKey=>$roomKey, pin=>$pin }");
            }

            //TODO - send email invite from here
        } else {
            $info_msg = "Unable to create telemedicine conference room: $roomname";
        }
    } else if ($status === '<') {  //TELEMEDICINE IN ROOM

        if ($room_url = vu2vu_getRoom_url($vu2vu_client, $roomname)) {
            $info_msg = "Video URL is:" . $room_url;
        } else {
            $info_msg = "Unable to get telemedicine conference room URL: $roomname";
        };
    } else if ($status === '>') {  //TELEMEDICINE CHECKED OUT

        if (vu2vu_deleteRoom($vu2vu_client, $roomname)) {
            $info_msg = "Telemedicine conference room removed: $roomname";
        } else {
            $info_msg = "Unable to remove telemedicine conference room: $roomname";
        };
    }

    return ($location);
}
