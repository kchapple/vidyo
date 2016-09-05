<?
include "display.php";

display_header();

?>
<div align=center>

<h2>search API</h2>

<form name="input" action="searchByEntityID.php" method="get">
<table>
	<tr>
	<td>EntityId</td>
	<td><input type="text" name="entityId" /></td>
	</tr>
</table>
<input type="submit" value="SearchByEntityID" />
</form>
<br><br>
<?
display_footer();
?>
