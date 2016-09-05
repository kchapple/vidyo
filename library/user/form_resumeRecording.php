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

<h2>resumeRecording API</h2>
<?
   echo "<br><br>(own conferenceID is $entityId)<br><br>";
?>
<form name="input" action="resumeRecording.php" method="get">
<table>
	<tr>
	<td>conferenceID</td>
<?
	echo "<td><input type=\"text\" name=\"conferenceID\" value=\"$entityId\" /></td>";
?>
	</tr>
	<tr>
	<td>recorderID</td>
	<td><input type="text" name="recorderID" /></td>
	</tr>
	<tr>
	<td>moderatorPIN</td>
	<td><input type="text" name="moderatorPIN" /></td>
	</tr>
</table>
<input type="submit" value="resumeRecording" />
</form>
<br><br>
<?
display_footer();
?>
