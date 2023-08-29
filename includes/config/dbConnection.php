<?php 
$serverName = "localhost";
$dbuserName = "root";
$dbpassword = "";
$dbName = "practice";

$dbs = "mysql:host=$serverName;dbname=$dbName";
try {
    $pdo = new PDO($dbs,$dbuserName,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "<h1>connection successfull</h1>";
} catch (PDOException $e) {
    die('ERROR:Could Not Connect '. $e->getMessage());
}
?>