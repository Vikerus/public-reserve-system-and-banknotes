<?php
session_start();
$timechecker = $_SERVER['REQUEST_TIME_FLOAT']-0.100;
$timesession = $_SESSION['timecheck'];
if($timesession >= $timechecker){echo "There is a .9 second wait between queries!";}else{
$_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];
// Array with names
$a[] = "Silver Membership - 1oz total per Month:member_001";
$a[] = "Gold Membership - 1oz+8g total per Month:member_002";
$a[] = "Emerald Membership - 2oz total per Month:member_003";
$a[] = "Diamond Membership - 2oz+8g total per Month:member_004";
$a[] = "Green Diamond Membership - 3oz total per Month:member_005";
$a[] = "First Shelf Strain - 1g:flower_001";
$a[] = "Second Shelf Strain - 1g:flower_002";
$a[] = "Third Shelf Strain - 1g :flower_003";
$a[] = "Top Shelf Strain - 1g:flower_004";
$a[] = "Reserve Shelf Strain - 1g:flower_005";
$a[] = "Private Reserve Strain - 1g:flower_006";
$a[] = "THC Fine - .5g:oil_001";
$a[] = "THC Ultra Fine - .5g:oil_002";
$a[] = "CBD Fine - .5g:ext_001";
$a[] = "CBD Ultra Fine - .5g:ext_002";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
}
?> 