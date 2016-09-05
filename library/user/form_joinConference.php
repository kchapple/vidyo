<?
if (!session_is_registered('id')) 
{
	session_register('id');
	$entityId = $_SESSION['entityId'];
}

include "display.php";

display_header();

?>
<div align=center>

<h2>joinConference API</h2>
<?
   echo "<br><br>(own conferenceID is $entityId)<br><br>";
?>
<form name="input" action="joinConference.php" method="get">
<table>
	<tr>
	<td>conferenceID</td>
<?
	echo "<td><input type=\"text\" name=\"conferenceID\" value=\"$entityId\" /></td>";
?>                                
	</tr>
</table>
<input type="submit" value="JoinConference" />
</form>
<br><br>
<?
display_footer();
?>