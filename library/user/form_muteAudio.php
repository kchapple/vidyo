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

<h2>muteAudio API</h2>
<?
   echo "<br><br>(own conferenceID is $entityId)<br><br>";
?>
<form name="input" action="muteAudio.php" method="get">
<table>
	<tr>
	<td>conferenceID</td>
<?
   echo "<td><input type=\"text\" name=\"conferenceID\" value=\"$entityId\" /></td>";
?>
	</tr>
	<tr>
	<td>participantID</td>
	<td><input type="text" name="participantID" /></td>
	</tr>
</table>
<input type="submit" value="MuteAudio" />
</form>
<br><br>
<?
display_footer();
?>