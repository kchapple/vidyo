<?php
/**
 * Created by PhpStorm.
 * User: kchapple
 * Date: 8/15/16
 * Time: 2:00 PM
 */

use Framework\Plugin\UserGroup\UserGroup;
use Framework\Plugin\UserGroup\UserGroupText;
use Framework\Plugin\Globals\Globals;
use Framework\Plugin\Globals\Setting;

require_once __DIR__."/library/vu2vu_events.inc.php";

function gp_after_appointment( $row )
{
    $location = json_decode( $row['pc_location'] );
    $queryString = [
        'portalUri' => $location->portalUri,
        'roomKey' => $location->roomKey,
        'pin' => $location->pin,
        'appointmentId' => $row['pc_eid'],
        'userId' => $row['pc_aid'],
        'pid' => $row['pc_pid']
    ];
    if ( $location ) { // &&
//        ( $row['pc_aid'] == $_SESSION['authUserID'] ||
//        $_SESSION['authUser'] == 'admin' ) ) { ?>
        <div>
            <br>
            <a href="javascript;" class="css_button join-appointment" style="display: none;"><span>Join</span></a>

            <script type="text/javascript">
                $(document).ready( function() {

                    $(".join-appointment").show();

                    $(".join-appointment").click( function( e ){
                        e.preventDefault();
                        parent.left_nav.loadFrame( "vidyo", "vidyo", "vidyo/index.php?action=vidyo&<?php echo http_build_query( $queryString ); ?>" );
                    });
                });
            </script>
        </div>
        <br>
    <?php }
}
add_action( 'demographics_after_appointment', 'gp_after_appointment' );


function add_vidyo_globals( & $args )
{
    $globals = new Globals( $args );
    $setting = new Setting( 'Enable Vidyo', 'bool', 0, 'Check the box to enable Vidyo' );
    $globals->appendToSection( 'Connectors', 'vidyo_enable', $setting );
    $setting = new Setting( 'Vidyo Portal', 'text', 'OpenEMR.test.vu2vu.com', 'The default Vidyo portal for users, can be overridden by user setting' );
    $globals->appendToSection( 'Connectors', 'vidyo_portal', $setting );
    $args = $globals->getData();
}
add_action( 'globals_init', 'add_vidyo_globals' );

/**
 *
 * @param array $args Contains the request GET/POST
 */
function add_vidyo_fields( $args, $actionKey )
{
    $settings = vu2vu_getUserSettings( $args['id'] );
    $vu2vu_portal_url = ( isset($args['vu2vu_portal_url']) ? $args['vu2vu_portal_url'] : $settings['vu2vu_portal_url'] );
    $vu2vu_username = ( isset($args['vu2vu_username']) ? $args['vu2vu_username'] : $settings['vu2vu_username'] );
    $vu2vu_password = ( isset($args['vu2vu_password']) ? $args['vu2vu_password'] : $settings['vu2vu_password'] );
    $userGroup = new UserGroup( $args['id'] );
    $usernameField = new UserGroupText( 'vu2vu_username', 'Vidyo Username', $vu2vu_username );
    $userGroup->add( $usernameField );
    $portalUrlField = new UserGroupText( 'vu2vu_portal_url', 'Vidyo Portal URL', $vu2vu_portal_url );
    $userGroup->add( $portalUrlField );
    $userPassword = new UserGroupText( 'vu2vu_password', 'Vidyo Password', $vu2vu_password );
    $userGroup->add( $userPassword );

    if ( $actionKey == 'usergroup_admin_add' || $actionKey == 'usergroup_admin_edit' ) {
        $userGroup->renderUserAdminAdd();
    } else {
        $userGroup->saveAsUserSettings();
    }
}
add_action( 'usergroup_admin_add', 'add_vidyo_fields' );
add_action( 'usergroup_admin_edit', 'add_vidyo_fields' );
add_action( 'usergroup_admin_save', 'add_vidyo_fields' );

function vidyo_check_status( $args )
{
    $TELEMED_CATS = [
        5,
        12,
    ];
    if ( in_array( $args['category'], $TELEMED_CATS ) ) {
        $roomname = $args['pid'] . '-' . $args['provider'] . '-' . $args['date'] . '-' . $args['starttime']; //construct Room Name
        $login = vu2vu_getLogin($_SESSION['authUserID']);
        $vu2vu_client = vu2vu_createClient(vu2vu_getWSDL(), $login); // Create client and login
        vu2vu_check_status( $vu2vu_client, $login['login'], $roomname, $args['id'], $args['status'], "Appointment with pid={$args['pid']}" );  // check for telemedicine actions to update
    }
}
add_action( 'after_update_event', 'vidyo_check_status' );


function add_vidyo_admin_menu( &$menu_list )
{
    $title = 'Vidyo Admin';
    $formEntry=new stdClass();
    $formEntry->label=xl_form_title($title);
    $formEntry->url='/interface/vidyo/index.php?action=admin';
    $formEntry->requirement=0;
    $formEntry->target='vidyo';
    array_push( $menu_list->children, $formEntry );
}

function vidyo_admin_menu_update( &$menu_update_map )
{
    if ( !is_array( $menu_update_map["Administration"] ) ) {
        $menu_update_map["Administration"] = array( 'add_vidyo_admin_menu' );
    } else {
        $menu_update_map["Administration"] []= 'add_vidyo_admin_menu';
    }
}
add_action( 'menu_update', 'vidyo_admin_menu_update' );
