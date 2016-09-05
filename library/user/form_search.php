<?
include "display.php";

display_header();

?>
<div align=center>

<h2>search API</h2>

<form name="input" action="search.php" method="get">
<table>
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
	<td>EntityType</td>
	<td><input type="radio" name="EntityType" value="Member"/>Member 
		<input type="radio" name="EntityType" value="Room"/>Room 
		<input type="radio" name="EntityType" value="Legacy"/>Legacy</td>
	</tr>
	<tr>
	<td>query</td>
	<td><input type="text" name="query" /></td>
	</tr>
</table>
<input type="checkbox" name="useAuthToken" checked="checked" value="1"> Use
AuthToken Credentials instead of user/pass <br><br>
<input type="submit" value="Search" />
</form>
<br><br>
<?
display_footer();
?>