<?php


header('Content-type: text/json');
header('Content-type: application/json; charset-utf-8');
header('Access-Control-Allow-Origin: *');

include 'connection.php';
include 'classes.php';

$sQuery = "SELECT * FROM zanrovi";
$oRecord = $oConnection->query($sQuery);
$oZanrovi = array();
while($oRow = $oRecord->fetch(PDO::FETCH_BOTH))
{
    $zanr_id = $oRow['zanr_id'];
    $zanr_naziv = $oRow['zanr_naziv'];
    $oZanr = new Zanr($zanr_id, $zanr_naziv);
    array_push($oZanrovi, $oZanr);
}
echo json_encode($oZanrovi);
?>