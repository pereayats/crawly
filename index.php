<html>
<head>

<title>Crawly</title>

<meta name="description" content="Troba tot el que est&agrave;s buscant">
<meta name="keywords" content="cerca,search,cercar,cercador,buscador,buscar">
<meta name="author" content="Pere Ayats">
<meta charset="UTF-8">

<script type="text/javascript" src="jquery.js"></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
 
<script type="text/javascript">
$().ready(function() {
    $("#paraulacercada").autocomplete("suggeriments.php", {
        width: 700,
        matchContains: true,
        selectFirst: false
    });
});
</script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>

<style type="text/css">

* {
   margin: 0px;
   padding: 0px;
}

@font-face {
	font-family: "Cranberry";
	src: url(CranberryBlues.ttf);
}

body {
	background-color: #96f8e3;
}


#header {
	background-color: white;
	width: 100%;
	padding-top: 15px;
	padding-bottom: 15px;
	text-align: center;
	margin: 0 auto;
}

#header #logo {
	text-align: center;
	color: #575757;
	font-family: Cranberry;
	font-size: 70px;
	text-decoration: none;
}

#line {
	width: 100%;
	background-color: #427067;
	height: 10px;
	opacity: 0.5;
}

#menu {
	float: left;
	text-align: left;
	margin: 15px;
	margin-top: 30px;
}

#menu .submenu {
	opacity: 0.7;
	font-family: 'Ubuntu';
	background-color: #2fdab8;
	color: white;
	padding: 10px;
	text-decoration: none;
	border-radius: 5px;
	font-size: 16px;
	margin: 15px;
	-webkit-transition: all 600ms cubic-bezier(0.420, 0.000, 0.580, 1.000);
	-moz-transition: all 600ms cubic-bezier(0.420, 0.000, 0.580, 1.000);
	-ms-transition: all 600ms cubic-bezier(0.420, 0.000, 0.580, 1.000);
	-o-transition: all 600ms cubic-bezier(0.420, 0.000, 0.580, 1.000);
	transition: all 600ms cubic-bezier(0.420, 0.000, 0.580, 1.000);
}

#menu .submenu:hover {
	color: #427067;
	padding: 10px;
	text-decoration: none;
	background-color: #96f8e3;
}

.welcome {
	font-family: 'Ubuntu';
	font-size: 64px;
	color: #427067;
	text-align: center;
	font-weight: 400;
}

#paraulacercada {
	margin: 0 auto;
	display: inline-block;
	background-color: white;
	border-top-left-radius: 5px;
	border-bottom-left-radius: 5px;
	width: 700px;
	height: 50px;
	border-color: white;
	border-top: none;
	border-left: none;
	font-size: 18px;
	padding: 10px;
	margin-right: -5px;
}	

#cerca {
	display: inline-block;
	padding: 9px;
	background-color: #2fdab8;
	border-top-right-radius: 5px;
	border-bottom-right-radius: 5px;
	margin-left: 0px;
	margin: 15px;
	border: none;
	font-family: 'Open Sans';
	color: white;
	font-weight: bold;
	font-size: 16px;
	height: 51px;
	margin: 0 auto;
	width: 100px;
	vertical-align: top;
}
	

</style>

</head>
<body>

<div id="header">
<a href="/" id="logo">
<img src="logo.png" width="100" height="59" style="vertical-align: middle" /> crawly
</a>
</div>
<div id="line"></div>

<div id="menu">
<a href="about.php" class="submenu">Qu&egrave; &eacute;s aix&ograve;?</a> <a href="add.php" class="submenu">Afegeix el teu enlla&ccedil;</a>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<center><div class="welcome">Troba tot el que est&agrave;s buscant</div><center>
<br>
<br>
<form action="search.php" method="post">
<input type="text" name="paraulacercada" id="paraulacercada" autocomplete="off" />
<input type="submit" value="Cerca" id="cerca" />
</form>

</body>
</html>