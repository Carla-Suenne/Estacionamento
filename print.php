<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');     //displays php errors

include("phpserial.php");

$serial = new phpSerial();

$serial->deviceSet('/dev/ttyACM0'); 


// If you want to change the configuration, the device must be closed 
$serial->confBaudRate(9600); //Baud rate: 9600
$serial->confParity("none");  //Parity (this is the "N" in "8-N-1")
$serial->confCharacterLength(8); //Character length (this is the "8" in "8-N-1")
$serial->confStopBits(1);  //Stop bits (this is the "1" in "8-N-1")
$serial->confFlowControl("none");

$serial->deviceOpen();
sleep(2);
$read = $serial->readPort();
echo $read;


?>