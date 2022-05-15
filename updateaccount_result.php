<?php

	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$accountId = $_POST["accountId"];
	$name = $_POST["name"];
	$studentId = $_POST["studentId"];
	$department = $_POST["department"];
	$phone = $_POST["phone"];

	$sql = "UPDATE account SET name='".$name."', studentId='".$studentId."', department ='".$department."', phone='".$phone."' WHERE accountId='".$accountId."' ";
	
	$ret = mysqli_query($con, $sql);

	echo "<h1>회원 정보 수정 결과</h1>";
	if($ret) {
		echo "데이터가 성공적으로 수정됨.";
	}
	else {
 		echo "데이터 수정 실패!!!"."<BR>";
 		echo "실패 원인 :".mysqli_error($con);
	}	
	mysqli_close($con);

	echo "<BR> <a href='main.html'> <--초기 화면</A> ";
?>