<?php

function display_header()
{
echo "
	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
	<html>

	<head>
		<title>Web Services Sample</title>
		<link rel='stylesheet' type='text/css' href='style/global.css'>
	</head>

	<body>
		<div align='center'>
		<div><img src='logo.gif' alt='Vidyo'/></div>
		<h2>Web Services API : User Examples</h2>
<br><br>";


}

function display_footer()
{
echo "
				<p>&copy;2013 Vidyo Inc. All rights reserved.</p>
        </div>
	</body>
	</html>
";
}

function soap_debugprint($soapclient)
{      
	echo"Debugging: print SOAP Request<br>";
	print "Request :".htmlspecialchars($soapclient->__getLastRequest());
	echo"<br><br>";
	echo"Debugging: print SOAP Response<br>";
	print "Response:".htmlspecialchars($soapclient->__getLastResponse());
	echo"<br><br>";
}

?>
