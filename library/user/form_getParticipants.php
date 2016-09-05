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

<h2>getParticipants API</h2>
<?
   echo "<br><br>(own conferenceID is $entityId)<br><br>";
?>

<form name="input" action="getParticipants.php" method="get">
<table>
	<tr>
	<td>conferenceID</td>
	<td><input type="text" name="conferenceID" /></td>
	</tr>
	<tr>
	<td>start</td>
	<td><input type="text" name="start" /></td>
	</tr>
	<tr>
	<td>limit</td>
	<td><input type="text" name="limit" /></td>
	</tr>
	<tr>
	<td>sortBy</td>
	<td><input type="text" name="sortBy" /></td>
	</tr>
	<tr>
	<td>dir</td>
	<td><input type="text" name="dir" /></td>
	</tr>
	<tr>
	<td>query</td>
	<td><input type="text" name="query" /></td>
	</tr>
</table>
<input type="submit" value="Search" />
</form>
<br><br>
<?
display_footer();
?>
