<?

session_start();
$_SESSION['id']=$_GET['id'];
session_register('id');
//Change this FQDN and path accroding to your env.
// $custom_portal = '192.168.5.222';
// $path = 'tool/20/user';
$location = "Location: http://stunusa.vidyo.com/ws/user/whitedot.jpg";

header( $location ) ;
//echo $_SESSION['id'];
?>
