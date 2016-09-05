<?
include "display.php";

display_header();

?>
<div align=center>

<h2>generateAuthToken API</h2>

<form name="input" action="generateAuthToken.php" method="get">
<table>
	<tr>
	<td>Validity time in seconds (0 for until log out):</td>
    <td><input type="text" name="validityTime" value="0" /></td>
	</tr>
</table>
<input type="submit" value="Generate" />
</form>
<br><br>
<?
display_footer();
?>
