<?php

include('config.php');
//$date - Y-m-d format
function getShippingDate($orderDate, $oderTime)
{
	$holidays = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday"];
	$cutOffTime = "11";

	if ($oderTime >= $cutOffTime) { //if user order after 11am
		while (in_array(date('l', strtotime($orderDate)), $holidays)) {
			$orderDate = date('Y-m-d', strtotime("$orderDate +1 day"));
		}
		echo "Calculated Shipping Date : " . $orderDate;
	} else { //if user order before cutoff time

		while (in_array(date('l', strtotime($orderDate)), $holidays)) {
			if ($orderDate == date('Y-m-d')) {
				$orderDate = date('Y-m-d', strtotime("$orderDate +1 day"));
			} else {
				$orderDate = date('Y-m-d', strtotime("$orderDate +1 day"));
			}
		}
		echo "Calculated Shipping Date : " . $orderDate;
	}
}

// here is an example
$orderDate = "2022-12-16";
$oderTime = "10";
echo getShippingDate($orderDate, $oderTime);
