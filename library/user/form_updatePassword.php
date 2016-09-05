<?
include "display.php";

display_header();

?>
<div align=center>

<h2>updatePassword API</h2>

<form name="input" action="updatePassword.php" method="get">
<table>
	<tr>
	<td>New Password</td>
	<td><input type="text" name="password" /> (not hiding for debug)</td>
	</tr>
</table>
<input type="submit" value="UpdatePassword" />
</form>
<br><br>
<?
display_footer();
?>