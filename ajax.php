<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
define('DB_HOST', 'localhost');
define('DB_NAME', 'invoice_admin');
define('DB_USERNAME','root');
define('DB_PASSWORD','');


$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if( mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

    $SelectID = "SELECT memberId FROM member ORDER BY memberId DESC LIMIT 1";
	$Result = mysqli_query($con, $SelectID);
	//$memberId = '';  /// yha database ke column ko check kr rhe h ki blanck to nahi h /// 
	//$IdGenrate = 0;
	if ($Result->num_rows > 0)
	{
				$data = mysqli_fetch_array($Result);
				$parentId = $data["memberId"];
	}
			else
			{
	$parentId = 'IN2017000';
			}
	$IdGenrate = substr($parentId,6, 3);
	echo $Idmem = 'IN2017' . str_pad($IdGenrate + 1, 3, '0', STR_PAD_LEFT);
	echo $query1 = "insert into member (memberId) Values('$Idmem')";
	$Result = mysqli_query($con, $query1);
	
?>
