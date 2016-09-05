<?
include "display.php";

display_header();

?>
<div align=center>

<h2>createRoomPIN API</h2>

<form name="input" action="createRoomPIN.php" method="get">
<table>
	<tr>
	<td>New PIN</td>
	<td><input type="text" name="pin" /></td>
	</tr>
</table>
<input type="submit" value="CreateRoomPIN" />
</form>
<br><br>
<?
display_footer();
?>