<?
include "display.php";

display_header();

?>
<div align=center>

<h2>updateLanguage API</h2>

<form name="input" action="updateLanguage.php" method="get">
<table>
	<tr>
	<td>New Language</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="en"/> English</td>
	<td><input type="radio" name="Language" value="de"/> German</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="es"/> Spanish</td>
	<td><input type="radio" name="Language" value="fr"/> French</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="it"/> Italian</td>
	<td><input type="radio" name="Language" value="ja"/> Japanese</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="ko"/> Korean</td>
	<td><input type="radio" name="Language" value="pt"/> Portuguese</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="zh_CN"/> Chinese</td>
	<td></td>
	</tr>
</table>
<input type="submit" value="UpdateLanguage" />
</form>
<br><br>
<?
display_footer();
?>