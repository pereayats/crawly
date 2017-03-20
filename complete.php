<html>
<head>

<title>Crawly | S'ha afegit correctament l'enlla&ccedil;</title>

<meta name="description" content="Troba tot el que est&agrave;s buscant">
<meta name="keywords" content="cerca,search,cercar,cercador,buscador,buscar,indexar,afegir">
<meta name="author" content="Pere Ayats">
<meta charset="UTF-8">

<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

<style type="text/css">

* {
	margin: 0px;
	padding: 0px;
}

a {
	text-decoration: none;
}

body {
	background-color: #2fdab8;
} 

@font-face {
	font-family: "Cranberry";
	src: url(CranberryBlues.ttf);
}

#header {
	width: 100%;
	padding-top: 30px;
	padding-bottom: 30px;
	background-color: #96f8e3;
	text-align: center;
}

#header #logo {
	text-align: center;
	color: #575757;
	font-family: Cranberry;
	font-size: 70px;
	display: inline;
	vertical-align: middle;
	margin-right: 15px;
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
	text-align: center;
	margin: 15px;
	margin-top: 30px;
}

#menu .submenu {
	opacity: 0.7;
	font-family: 'Ubuntu';
	background-color: #427067;
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
	background-color: #2fdab8;
}

#message {
	background: -webkit-linear-gradient(top, white, #2fdab8);
	background: -moz-linear-gradient(top, white, #2fdab8);
	background: -o-linear-gradient(top, white, #2fdab8);
	background: linear-gradient(top, white, #2fdab8);
	width: 825px;
	margin: 0 auto;
	padding: 25px;
	border-radius: 5px;
}

#message #title {
	margin: 15px;
	text-align: center;
	font-size: 54px;
	font-family: 'Ubuntu';
	font-weight: 400;
	color: #427067;
	text-decoration: none;
}

</style>

</head>
<body>
<center>
<div id="header">
<a href="/" id="logo">crawly</a>
</div>
</center>

<div id="line"></div>

<center><div id="menu"><a href="add.php" class="submenu">Afegeix un altre enlla&ccedil;</a><a href="/" class="submenu">Torna al Cercador</a></div></center>

<br><br>

<?php
	
	$url = $_POST['webpage'];
	
	if (stripos($url, "www.") <= 8) {
		$url = preg_replace('/www./', '', $url, 1);
	}
	
	$result = file_get_contents($url);
	
	preg_match("/\<title\b.*\>(.*)\<\/title\>/i",$result,$title);
	
	$titol = utf8_decode($title[1]);
	
	$nocssdata = preg_replace("@<style[^>]*?>.*?</style>@siu"," ",$result);
	$noscriptsdata = preg_replace("@<script[^>]*?>.*?</script>@siu"," ",$nocssdata);
	$nohtmldata = preg_replace("/<[^>]*>/", " ", $noscriptsdata);
	$nohtmldata = utf8_decode($nohtmldata);
	
	$nohtmldata = preg_replace("/[^\pL-'·]+/"," ",$nohtmldata);
	$nohtmldata = implode(" ", array_unique(explode(" ", $nohtmldata)));
	$nohtmldata = trim($nohtmldata);
	$paraules = split(" ", $nohtmldata);
	
	$connexio = mysql_connect('', '', '');
	
	mysql_select_db("", $connexio);
	
	$verify = mysql_query("DELETE FROM InWeb WHERE `url` = '$url'", $connexio);
	
	foreach ($paraules as $valor) {
		$sql="INSERT INTO InWeb (`paraula`, `url`, `titol`)
		VALUES ('$valor', '$url', '$titol')";
		$insert = mysql_query($sql, $connexio);
	}
	
	if (!$insert) {
		echo "<br><br><br><div id=\"message\"><div id=\"title\">Hi ha hagut un error. Torna-ho a intentar<br><br></div></div>";
	
	}
	
	else {
		echo "<br><br><br><div id=\"message\"><div id=\"title\">S'ha afegit l'enlla&ccedil; correctament<br><br></div></div>";

	}
	
	mysql_close($connexio);

?>

</body>
</html>