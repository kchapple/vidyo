<?
include "display.php";

display_header();

?>
<div align=center>

<h2>addToMyContacts API</h2>

<form name="input" action="addToMyContacts.php" method="get">
<table>
	<tr>
	<td>entityID</td>
	<td><input type="text" name="add_entityID" /></td>
	</tr>
</table>
<input type="submit" value="AddToMyContacts" />
</form>
<br><br>
<?
display_footer();
?>