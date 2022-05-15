<?php
 	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$name = $_POST["name"];
	$studentId = $_POST["studentId"];
	$department = $_POST["department"];
	$phone = $_POST["phone"];
	
	$sql = "INSERT INTO account (accountId,name, studentId, department,phone) VALUES ('".$phone."','".$name."','".$studentId."','".$department."','".$phone."')";
	$ret = mysqli_query($con, $sql);

 	echo "<h1>신규 회원 가입 결과</h1>";
 	if($ret) {
 		echo "데이터가 성공적으로 입력됨.";
	 }
 	else {
 		echo "데이터 입력 실패!!!"."<BR>";
 		echo "실패 원인 :".mysqli_error($con);
 	}
	mysqli_close($con);
	echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
?>