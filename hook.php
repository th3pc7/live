<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=yes, minimum-scale=1.0">
		<title>And your phone number is...</title>
		<style>
			body {
				font: 17px sans-serif;
				color: #444;
				margin: 20px;
			}
			
		</style>
	</head>
	<body>
<?php
$headers = apache_request_headers();
if ( !empty($headers['x-up-calling-line-id']) ) $phone_number = $headers['x-up-calling-line-id'];

if (isset($phone_number)) {
	echo "<p>Your phone number is:</p><h1>$value</h1><p>Did you know that this number is sent to <strong>every</strong> website you visit (when not using Wi-Fi)?</p>";
} else {
	echo '<p>No phone number found. Make sure Wi-Fi is turned off and <a href="./">try again</a>.</p>';
}
?>
		<p><a href="http://www.thinkbroadband.com/news/4990-o2-shares-your-mobile-phone-number-with-every-website-you-visit.html">More info here</a>.</p>
		<p>Try <a href="http://lew.io/headers.php">this demo</a> by <a href="http://twitter.com/lewispeckover">@lewispeckover</a>.</p>
		<p><a href="https://gist.github.com/1675764">Source code for this page</a>.</p>
	</body>
</html>