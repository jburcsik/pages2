<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/pages/templates/css/styles.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>

<!-- CSS reset -->
<link rel="stylesheet" href="/pages/templates/css/cssreset.css" />

<!-- CSS Layout -->
<link rel="stylesheet" href="/pages/templates/css/layout.css" />

<!-- CSS typography -->
<link rel="stylesheet" href="/pages/templates/css/typo.css" />

<!-- CSS Main -->
<link rel="stylesheet" href="/pages/templates/css/styles.css" />



<!-- Call to jQuery on Googles servers -->
<script src="/pages/templates/js/jquery.1.3.2.js" type="text/javascript"></script>

<!-- Call to PNG fix -->
<script src="/pages/templates/js/jquery.pngfix.js" type="text/javascript"></script>

<!-- Call to Custom Library fix -->
<script src="/pages/templates/js/customlibrary.js" type="text/javascript"></script>

<!-- Call to PNG fix -->
<script src="/pages/templates/js/custominit.js" type="text/javascript"></script>

<!-- IE7 Fix : Makes ie6 browsers render as though there are ie7 -->
<!--[if lt IE 7]>
<script src="js/iebehaviorfix.js" type="text/javascript"></script>
<![endif]-->

</head>

<body>
<!-- Set Header -->
<div class='container'>
	<div id='header' class='page-section'>
		<h1>##TITLE##</h1>
	</div>
</div>
<!-- End Header -->

<!-- Set Body -->
<div class='container'>
	<div id='content' class='page-section'>
	<div id='nav'>
	##NAV##
	</div>
		<p>*i1* Welcome to the ##product## website I hope you like ##keywords## *i1**b1* ##product## makes my body area ##keyword## *b1**f3* The footer is the best area for sales *f3*</p>
	</div>
</div>
<!-- End Body -->

<!-- Set Footer -->
<div class='container'>
	<div id='footer' class='page-section'>
		<p><? include 'http://'. $_SERVER['SERVER_NAME']. '/pages/library/allcitydropdown.php' ?></p>
	</div>
</div>
<!-- End Footer -->

<!-- Set Copywrite -->
<div class='container'>
	<div id='copy-write' class='page-section'>
		<p>copy write -- Some rights reserved</p>
	</div>
</div>
<!-- End Copywrite -->




</body>
</html>
