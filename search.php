<html>
<head>

<title>Crawly | Resultats per la paraula <?php echo $_POST['paraulacercada']?></title>

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
        width: 500,
        matchContains: true,
        selectFirst: false
    });
});
</script>
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

#header #paraulacercada {
	background-color: white;
	border-top-left-radius: 5px;
	border-bottom-left-radius: 5px;
	width: 500px;
	height: 50px;
	border-color: white;
	border-top: none;
	border-left: none;
	font-size: 18px;
	padding: 10px;
	display: inline-block;
	vertical-align: middle;
	margin-right: -5px;
}

#header #cerca {
	display: inline-block;
	padding: 9px;
	background-color: #2fdab8;
	border-top-right-radius: 5px;
	border-bottom-right-radius: 5px;
	margin-left: 0px;
	border: none;
	font-family: 'Open Sans';
	color: white;
	font-weight: bold;
	font-size: 16px;
	height: 50px;
	margin: 0 auto;
	width: 100px;
	vertical-align: middle;
}

#line {
	width: 100%;
	background-color: #427067;
	height: 10px;
	opacity: 0.5;
}

.results {
	background: -webkit-linear-gradient(left, white, #2fdab8);
	background: -moz-linear-gradient(left, white, #2fdab8);
	background: -o-linear-gradient(left, white, #2fdab8);
	background: linear-gradient(left, white, #2fdab8);
	width: 825px;
	margin: 0 auto;
	padding: 25px;
	border-radius: 5px;
}

.results #title {
	margin: 15px;
	text-align: justify;
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 400;
	color: #427067;
	text-decoration: none;
}

.results #url {
	margin: 15px;
	margin-top: 5px;
	text-align: justify;
	font-size: 17px;
	font-family: 'Open Sans';
	font-weight: bold;
	color: #2fdab8;
	text-decoration: none;
}

.results #subtitle {
	margin: 15px;
	text-align: justify;
	font-size: 17px;
	font-family: 'Open Sans';
	font-weight: bold;
	color: #575757;
	text-decoration: none;
}	

</style>

</head>
<body>
<center>
<form action="search.php" method="post" id="header">
<a href="/" id="logo">crawly</a>
<input type="text" name="paraulacercada" id="paraulacercada" autocomplete="off" />
<input type="submit" value="Cerca" id="cerca" />
</form>
</center>

<div id="line"></div>
<br><br>
<?php

	$word = $_POST['paraulacercada'];
	
	$connexio = mysql_connect('', '', '');
	
	mysql_select_db("", $connexio);
	
	$result = mysql_query("SELECT DISTINCT * FROM InWeb WHERE paraula = _utf8'$word' collate utf8_general_ci ORDER BY RAND()", $connexio);
	
	while($row = mysql_fetch_array($result)) {
		?><div class="results"><a href="<?php echo $row['url']; ?>"><div id="title"><?php
		echo utf8_encode($row['titol']);?></div><div id="url"><?php
		echo utf8_encode($row['url']);?></div></a><div id="subtitle"><?php
		echo "La paraula <font style=\"color: #2fdab8\">". utf8_encode($row['paraula']) ."</font> apareix a <u>". utf8_encode($row['titol'])."</u>.";?></div></div><br><br><?php
	}
	
	mysql_close($connexio);

?>

</body>
</html>