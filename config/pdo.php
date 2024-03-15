<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DBNAME", "grandanglelast");

$dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOexception $e) {
    die("Erreur de connexion à la base de données".$e->getMessage());

}

;?>