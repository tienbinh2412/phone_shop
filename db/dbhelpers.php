<?php
require_once("config.php");
function execute($sql){
    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

    mysqli_query($conn,$sql);

    mysqli_close($conn);
}
function executeResult($sql) {
	// Them du lieu vao database
	//B1. Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//B2. Thuc hien truy van insert
	$resultset = mysqli_query($conn, $sql);
	$data      = [];

	while (($row = mysqli_fetch_array($resultset, 1)) != null) {
		$data[] = $row;
	}

	//B3. Dong ket noi database
	mysqli_close($conn);

	return $data;
}