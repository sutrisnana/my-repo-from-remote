<?php
$serverName = "MSAAX"; //serverName\instanceName
$connectionInfo = array("Database" => "DBMSA", "UID" => "MSAAX\administrator", "PWD" => "Admm$403");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
    echo "Connection established.<br />";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}
