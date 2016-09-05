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

<h2>startRecording API</h2>
<?
   echo "<br><br>(own conferenceID is $entityId)<br><br>";
?>
<form name="input" action="startRecording.php" method="get">
<table>
	<tr>
	<td>conferenceID</td>
<?
	echo "<td><input type=\"text\" name=\"conferenceID\" value=\"$entityId\" /></td>";
?>
	</tr>
	<tr>
	<td>recorderPrefix</td>
	<td><input type="text" name="recorderPrefix" /></td>
	</tr>
	<tr>
	<td>moderatorPIN</td>
	<td><input type="text" name="moderatorPIN" /></td>
	</tr>
</table>
<input type="checkbox" name="webcast" checked="checked" value="1"> webcast <br><br>
<input type="submit" value="startRecording" />
</form>
<br><br>
<?
display_footer();
?>
