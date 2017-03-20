<?php

mysql_connect("", "", "") or die(mysql_error());
mysql_select_db("") or die(mysql_error());

$q = strtolower($_GET["q"]);
if (!$q) return;

$suggest_query = mysql_query("SELECT distinct(paraula) as autosuggest FROM InWeb WHERE paraula like('" .$q . "%') ORDER BY RAND()");
 while($suggest = mysql_fetch_array($suggest_query)) {
  echo utf8_encode($suggest['autosuggest']) . "\n";
 }

?>