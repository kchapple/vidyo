<?
include "display.php";

display_header();

?>
<div align=center>

<h2>removeFromMyContacts API</h2>

<form name="input" action="removeFromMyContacts.php" method="get">
<table>
	<tr>
	<td>entityID</td>
	<td><input type="text" name="remove_entityID" /></td>
	</tr>
</table>
<input type="submit" value="removeFromMyContacts" />
</form>
<br><br>
<?
display_footer();
?>