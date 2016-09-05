<?
include "display.php";

display_header();

?>
<div align=center>

<h2>directCall API</h2>

<form name="input" action="directCall.php" method="get">
<table>
	<tr>
	<td>entityID</td>
	<td><input type="text" name="add_entityID" /></td>
	</tr>
</table>
<input type="submit" value="DirectCall" />
</form>
<br><br>
<?
display_footer();
?>