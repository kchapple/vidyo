<?php

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




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>SOAP Test Interface</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->baseUrl(); ?>/views/admin/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->baseUrl(); ?>/views/admin/dist/starter-template.css" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="<?php echo $this->baseUrl(); ?>/views/admin/dist/grid.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don\'t actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SOAP Bubbles?</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>
			    <a href="index.php">Home</a></li>
            <li><a href="form_getLocationTags.php">Location Tags</a></li>
            <li><a href="index.php"></a></li>
            <li><a href="index.php"></a></li>
			<li><a href="index.php"></a></li>
			<li><a href="index.php"></a></li>
          </ul>
         
        </div><!--/.nav-collapse -->
      </div><!-- /.container -->
    </div> <!-- NavBar -->
	
'
?>
<div class="container">
    <br><br>

    <div class="row">
        <div id = "equalheight">
            <div class="col-md-6 align">
            <h3>Step one: Make sure a Member Exists</h3>
                <form name="input" action="index.php" method="get">
                    <table>
                        <tr>
                            <td>memberID</td>
                            <td><input type="text" name="addMemberID" /></td>
                        </tr>
                        <tr>
                            <td>Member Information</td>
                        </tr>
                        <tr>
                            <td>name<font color=red>(*)</font></td>
                            <td><input type="text" name="name" /></td>
                        </tr>
                        <tr>
                            <td>password<font color=red>(*)</font></td>
                            <td><input type="text" name="password" /> (not hiding for debug)</td>
                        </tr>
                        <tr>
                            <td>displayName<font color=red>(*)</font></td>
                            <td><input type="text" name="displayName" /></td>
                        </tr>
                        <tr>
                            <td>extension<font color=red>(*)</font></td>
                            <td><input type="text" name="extension" /></td>
                        </tr>
                        <tr>
                            <td>Language<font color=red>(*)</font></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="Language" value="en"/> English</td>
                            <td><input type="radio" name="Language" value="de"/> German</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="Language" value="es"/> Espagnole</td>
                            <td><input type="radio" name="Language" value="fr"/> French</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="Language" value="it"/> Italian</td>
                            <td><input type="radio" name="Language" value="ja"/> Japanese</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="Language" value="ko"/> Korean</td>
                            <td><input type="radio" name="Language" value="pt"/> Portuguese</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="Language" value="zh_CN"/> Chinese</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>RoleName<font color=red>(*)</font></td>
                            <td><input type="radio" name="RoleName" value="Admin"/> Admin
                                <input type="radio" name="RoleName" value="Operator"/> Operator
                                <input type="radio" name="RoleName" value="Normal"/> Normal
                                <input type="radio" name="RoleName" value="VidyoRoom"/> VidyoRoom
                                <input type="radio" name="RoleName" value="Legacy"/> Legacy </td>
                        </tr>
                        <tr>
                            <td>groupName<font color=red>(*)</font></td>
                            <td><input type="text" name="groupName" value = "Default"/></td>
                        </tr>
                        <tr>
                            <td>proxyName</td>
                            <td><input type="text" name="proxyName" /></td>
                        </tr>
                        <tr>
                            <td>emailAddress<font color=red>(*)</font></td>
                            <td><input type="text" name="emailAddress" /></td>
                        </tr>
                        <tr>
                            <td>created</td>
                            <td><input type="text" name="created" /></td>
                        </tr>
                        <tr>
                            <td>description</td>
                            <td><input type="text" name="description" /></td>
                        </tr>
                        <tr>
                            <td>allowCallDirect</td>
                            <td><input type="checkbox" name="allowCallDirect" /></td>
                        </tr>
                        <tr>
                            <td>allowPersonalMeeting</td>
                            <td><input type="checkbox" name="allowPersonalMeeting" /></td>
                        </tr>
                        <tr>
                            <td>locationTag<font color=red>(*)</font></td>
                            <td><input type="text" name="locationTag" value="Default"/></td>
                        </tr>

                    </table>
                    <input type="submit" value="AddMember" />
                </form>
                <br><br>
<?php
                //Initalize room and member arrays each time a button is pressed
                $room = array();
                $member = array();

                //set parameter to add
                if( $memberID = $_GET['addMemberID'] ) {

                $member['memberID'] = $memberID;
                if ($name = $_GET['name']) $member['name'] = $name;
                if ($password = $_GET['password']) $member['password'] = $password;
                if ($displayName = $_GET['displayName']) $member['displayName'] = $displayName;
                if ($extension = $_GET['extension']) $member['extension'] = $extension;
                if ($Language = $_GET['Language']) $member['Language'] = $Language;
                if ($RoleName = $_GET['RoleName']) $member['RoleName'] = $RoleName;
                if ($groupName = $_GET['groupName']) $member['groupName'] = $groupName;
                if ($proxyName = $_GET['proxyName']) $member['proxyName'] = $proxyName;
                if ($emailAddress = $_GET['emailAddress']) $member['emailAddress'] = $emailAddress;
                if ($created = $_GET['created']) $member['created'] = $created;
                if ($description = $_GET['description']) $member['description'] = $description;
                $member['allowCallDirect'] = false;
                if ($allowCallDirect = $_GET['allowCallDirect']) $member['allowCallDirect'] = $allowCallDirect;
                $member['allowPersonalMeeting'] = false;
                if ($allowPersonalMeeting = $_GET['allowPersonalMeeting']) $member['allowPersonalMeeting'] = $allowPersonalMeeting;
                if ($locationTag = $_GET['locationTag']) $member['locationTag'] = $locationTag;
                try {
                $addMemberParam = array('member' => $member);
                $addMemberResult = $client->addMember($addMemberParam);
                $addMemberResult = $addMemberResult->OK;
                echo "Add Member result is $addMemberResult<br><br>";
                } catch (SoapFault $e) {
                echo "SoapFault Adding Member: " . $e->getMessage() . "<br><br>";
                }

                }

 ?>
            </div>




            <div class="col-md-6 align">
                <h3>List of Members</h3>
                <?php
                //display users
                // prepare get member
                $filter = array();
                $filter['start'] = null;
                $filter['limit'] = 10;
                $filter['sortBy'] = null;
                $filter['dir']= null;
                $filter['query'] = null;

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



                ?>

            </div>
    </div>



    <div class="row">
        <div id = "equalheight">
            <div class="col-md-6 align" >
                <h3>Add Room (Step 2)</h3>
                <form name="input" action="index.php" method="get">
                    <table>
                        <tr>
                            <td>roomID</td>
                            <td><input type="text" name="addRoomID" value="Default" /></td>
                        </tr>
                        <tr>
                            <td>Room Information</td>
                        </tr>
                        <tr>
                            <td>name<font color=red>(*)</font></td>
                            <td><input type="text" name="name"  value = "nameRoom"/></td>
                        </tr>
                        <tr>
                            <td>RoomType</td>
                            <td>(<input type="radio" name="RoomType" value="Personal"/> Personal)
                                <input type="radio" name="RoomType" value="Public" checked /> Public
                        </tr>
                        <tr>
                            <td>ownerName<font color=red>(*)</font></td>
                            <td><input type="text" name="ownerName" value = "openemradmin" /></td>
                        </tr>
                        <tr>
                            <td>extension<font color=red>(*)</font></td>
                            <td><input type="text" name="extension" value = "" /></td>
                        </tr>
                        <tr>
                            <td>groupName<font color=red>(*)</font></td>
                            <td><input type="text" name="groupName" value  = "Default" /></td>
                        </tr>
                        <tr>
                            <td>RoomMode</td>
                            <td><input type="checkbox" name="isLocked"/> isLocked
                                <input type="checkbox" name="hasPIN" value="Normal"/> hasPIN,
                                roomPIN <input type="text" name="roomPIN" /></td>
                        </tr>
                        <tr>
                            <td>description</td>
                            <td><input type="text" name="description" /></td>
                        </tr>

                    </table>
                    <input type="submit" value="AddRoom" />
                </form>

                <?php

                //set parameter to add
                if( $roomID = $_GET['addRoomID'] ) {

                    $room['addRoomID'] = $roomID;
                    if ($name = $_GET['name']) $room['name'] = $name;
                    if ($RoomType = $_GET['RoomType']) $room['RoomType'] = $RoomType;
                    if ($ownerName = $_GET['ownerName']) $room['ownerName'] = $ownerName;
                    if ($extension = $_GET['extension']) $room['extension'] = $extension;
                    if ($groupName = $_GET['groupName']) $room['groupName'] = $groupName;
                    $erm = array('isLocked' => 0, 'hasPIN' => 0, 'hasModeratorPIN' => 0);
                    if ($isLocked = $_GET['isLocked']) $erm['isLocked'] = $isLocked;

                    if ($hasPIN = $_GET['hasPIN']) {
                        $erm['hasPIN'] = $hasPIN;
                        $erm['roomPIN'] = $_GET['roomPIN'];
                    }
                    $room['RoomMode'] = $erm;
                    if ($description = $_GET['description']) $room['description'] = $description;

                    try {
                        $addRoomParam = array('room' => $room);
                        $addRoomResult = $client->addRoom($addRoomParam);
                        $addRoomResult = $addRoomResult->OK;
                        echo "Add Room result is $addRoomResult<br><br>";
                    } catch (SoapFault $e) {
                        echo "SoapFault Create Room: " . $e->getMessage() . "<br><br>";
                    }

                }





                ?>


            </div>

            <div class="col-md-6 align" >
                <?php
                // prepare get member
                $filter = array();
                if( $start = $_GET['start'] ) $filter['start'] = $start;
                if( $limit = $_GET['limit'] ) $filter['limit'] = 10;
                if( $sortBy = $_GET['sortBy'] ) $filter['sortBy'] = $sortBy;
                if( $dir = $_GET['dir'] ) $filter['dir']= $dir;
                if( $query = $_GET['query'] ) $filter['query'] = $query;

                $getRoomsParam = array('Filter' => $filter);
                try {
                    $getRoomsParamResult = $client->getRooms($getRoomsParam);
                    echo "The number of searched entities is $getRoomsParamResult->total<br><br>";

                    foreach ($getRoomsParamResult->room as $room){
                        echo "roomID is $room->roomID<br>";
                        echo "name is $room->name<br>";
                        echo "RoomType is $room->RoomType<br>";
                        echo "ownerName is $room->ownerName<br>";
                        echo "extension is $room->extension<br>";
                        echo "groupName is $room->groupName<br>";
                        $erm = $room->RoomMode;
                        echo "RoomURL is $erm->roomURL<br>";
                        echo "isLocked is ";
                        if ($erm->isLocked)
                            echo "true<br>";
                        else
                            echo "false<br>";
                        echo "hasPIN is ";
                        if ($erm->hasPIN)
                            echo "true, roomPIN is $erm->roomPIN<br>";
                        else
                            echo "false<br>";
                        echo "hasModeratorPIN is ";
                        if ($erm->hasModeratorPIN)
                            echo "true, moderatorPIN is $erm->moderatorPIN<br>";
                        else
                            echo "false<br>";
                        echo "description is $room->description<br>";
                        echo "<br>";

                        //Hey TOny look here
                        $URL = $room->RoomMode->roomURL;
                    }

                } catch (SoapFault $e){
                    echo "SoapFault: " . $e->getMessage() . "<br><br>";
                }





                ?>

            </div><-- column








    </div>


</div>


    <br>
    <div class="row">
    <div id = "equalheight">
        <div class="col-md-12 col-sm-12 align">
        <h3>Delete Room (Necessary if Room Added)</h3>
            <form name="input" action="index.php" method="get" id="deleteRoom" href="index.php#deleteRoom">
                <table>
                    <tr>
                        <td>Delete roomID</td>
                        <td><input type="text" name="deleteRoomID" /></td>
                    </tr>
                </table>
                <input type="submit" value="DeleteRoomURL" />
            </form>

        <?php
            if( $deleteRoomID = $_GET['deleteRoomID'] ) {
                try {
                    $deleteRoomParam = array('roomID' => $deleteRoomID);
                    $deleteRoomResult = $client->deleteRoom($deleteRoomParam);
                    $deleteRoomResult = $deleteRoomResult->OK;
                    echo "Delete Room result is $deleteRoomResult<br><br>";
                } catch (SoapFault $e) {

                    echo "SoapFault Delete Room: " . $e->getMessage() . "<br><br>";
                }
            }


          ?>

        </div>
    </div>

        <br>
        <div class="row">
            <div id = "equalheight">
                <div class="col-md-12 col-sm-12 align">
                    <h2>getRoom API</h2>

                    <form name="input" action="index.php" method="get">
                        <table>
                            <tr>
                                <td>roomID</td>
                                <td><input type="text" name="getRoomID" /></td>
                            </tr>
                        </table>
                        <input type="submit" value="GetRoom" />
                    </form>

                    <div class="col-md-6 align" >
                    <?php
                    // prepare get room
                    if( $roomID = $_GET['getRoomID'] ) {
                        $getRoomParam = array('roomID' => $roomID);
                        try {
                            $getRoomResult = $client->getRoom($getRoomParam);
                            $room = $getRoomResult->room;
                            echo "roomID is $room->roomID<br>";
                            echo "name is $room->name<br>";
                            echo "RoomType is $room->RoomType<br>";
                            echo "ownerName is $room->ownerName<br>";
                            echo "extension is $room->extension<br>";
                            echo "groupName is $room->groupName<br>";
                            $erm = $room->RoomMode;
                            echo "RoomURL is $erm->roomURL<br>";
                            echo "isLocked is ";
                            if ($erm->isLocked)
                                echo "true<br>";
                            else
                                echo "false<br>";
                            echo "hasPIN is ";
                            if ($erm->hasPIN)
                                echo "true, roomPIN is $erm->roomPIN<br>";
                            else
                                echo "false<br>";
                            echo "hasModeratorPIN is ";
                            if ($erm->hasModeratorPIN)
                                echo "true, moderatorPIN is $erm->moderatorPIN<br>";
                            else
                                echo "false<br>";

                            echo "description is $room->description<br>";
                            echo "<br>";
                        } catch (SoapFault $e) {
                            echo "SoapFault: " . $e->getMessage() . "<br><br>";
                        }
                    }

                    ?>

                    </div>



                    <br><br>
                    <br><br>

                </div>
            </div>



    <div class="row">
        <div id = "equalheight">
            <div class="col-md-12 col-sm-12 align">
                <h2>getRooms Search</h2>

                <div align=center>

                    <h2>getRooms API</h2>

                    <form name="input" action="index.php" method="get">
                        <table>
                            <tr>
                                <td>start</td>
                                <td><input type="text" name="startGR" /></td>
                            </tr>
                            <tr>
                                <td>limit</td>
                                <td><input type="text" name="limitGR" /></td>
                            </tr>
                            <tr>
                                <td>sortBy</td>
                                <td><input type="text" name="sortByGR" /></td>
                            </tr>
                            <tr>
                                <td>dir</td>
                                <td><input type="text" name="dirGR" /></td>
                            </tr>
                            <tr>
                                <td>query</td>
                                <td><input type="text" name="queryGR" /></td>
                            </tr>
                        </table>
                        <input type="submit" value="Search" />
                    </form>
                    <br><br>

                    <div class="col-md-12 col-sm-12 align">

                        <?php

                        // prepare get member
                        $filter = array();
                        if( $start = $_GET['startGR'] ) $filter['start'] = $start;
                        if( $limit = $_GET['limitGR'] ) $filter['limit'] = $limit;
                        if( $sortBy = $_GET['sortByGR'] ) $filter['sortBy'] = $sortBy;
                        if( $dir = $_GET['dirGR'] ) $filter['dir']= $dir;
                        if( $query = $_GET['queryGR'] ) $filter['query'] = $query;

                        $getRoomsParam = array('Filter' => $filter);
                        try {
                            $getRoomsParamResult = $client->getRooms($getRoomsParam);
                            echo "The number of searched entities is $getRoomsParamResult->total<br><br>";

                            foreach ($getRoomsParamResult->room as $room){
                                echo "roomID is $room->roomID<br>";
                                echo "name is $room->name<br>";
                                echo "RoomType is $room->RoomType<br>";
                                echo "ownerName is $room->ownerName<br>";
                                echo "extension is $room->extension<br>";
                                echo "groupName is $room->groupName<br>";
                                $erm = $room->RoomMode;
                                echo "RoomURL is $erm->roomURL<br>";
                                echo "isLocked is ";
                                if ($erm->isLocked)
                                    echo "true<br>";
                                else
                                    echo "false<br>";
                                echo "hasPIN is ";
                                if ($erm->hasPIN)
                                    echo "true, roomPIN is $erm->roomPIN<br>";
                                else
                                    echo "false<br>";
                                echo "hasModeratorPIN is ";
                                if ($erm->hasModeratorPIN)
                                    echo "true, moderatorPIN is $erm->moderatorPIN<br>";
                                else
                                    echo "false<br>";
                                echo "description is $room->description<br>";
                                echo "<br>";
                            }

                        } catch (SoapFault $e){
                            echo "SoapFault: " . $e->getMessage() . "<br><br>";
                        }

                        ?>






            </div>
        </div>
    <div>










</div>






</div>




<?php


/****
 *
 *
 * Initalize the client info
 *
 *
 *
 */


















?>