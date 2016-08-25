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


function gp_after_appointment( $row )
{
    include __DIR__."/views/appointment_control.php";
}
add_action( 'demographics_after_appointment', 'gp_after_appointment' );


function add_vidyo_globals( & $args )
{
    $globals = new Globals( $args );
    $setting = new Setting( 'Enable Vidyo', 'bool', 0, 'Check the box to enable Vidyo' );
    $globals->appendToSection( 'Connectors', 'vidyo_enable', $setting );
    $setting = new Setting( 'Vidyo Portal', 'text', 'OpenEMR.test.vu2vu.com', 'The default Vidyo portal for users, can be overridden by user setting' );
    $globals->appendToSection( 'Connectors', 'maxemail_directory', $setting );
    $args = $globals->getData();
}
add_action( 'globals_init', 'add_vidyo_globals' );

/**
 *
 * @param array $args Contains the request GET/POST
 */
function add_vidyo_fields( $args, $actionKey )
{
    $userGroup = new UserGroup( $args['id'] );
    $usernameField = new UserGroupText( 'vidyo_username', 'Vidyo Username', $args['vidyo_username'] );
    $userGroup->add( $usernameField );
    $portalUrlField = new UserGroupText( 'vidyo_portal_url', 'Vidyo Portal URL', $args['vidyo_portal_url'] );
    $userGroup->add( $portalUrlField );
    $userPassword = new UserGroupText( 'vidyo_password', 'Vidyo Password', $args['vidyo_password'] );
    $userGroup->add( $userPassword );

    if ( $actionKey == 'usergroup_admin_add' || $actionKey == 'usergroup_admin_edit' ) {
        $userGroup->renderUserAdminAdd();
    } else {
        $userGroup->save();
    }
}
add_action( 'usergroup_admin_add', 'add_vidyo_fields' );
add_action( 'usergroup_admin_edit', 'add_vidyo_fields' );
add_action( 'usergroup_admin_save', 'add_vidyo_fields' );