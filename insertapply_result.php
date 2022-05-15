<?php
 	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$applicantId = $_POST["applicantId"];
	$clubId = $_POST["clubId"];
	$aboutMe = $_POST["aboutMe"];
	$motive = $_POST["motive"];
	$applytime = date('Y-m-s h:i:s', time());
	
	$sql = "INSERT INTO apply (applicantId,clubId,aboutMe,motive,applyTime) VALUES ('".$applicantId."','".$clubId."','".$aboutMe."','".$motive."','".$applytime."')";
	$ret = mysqli_query($con, $sql);

 	echo "<h1>지원 결과</h1>";
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