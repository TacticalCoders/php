<?php
 	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$accountId = $_POST["accountId"];
	
	$sql = "DELETE FROM account WHERE accountId='".$accountId."' ";

	$ret = mysqli_query($con, $sql);

	echo "<h1>회원 탈퇴 결과</h1>";
	if($ret) {
		echo $accountId." 계정정보가 성공적으로 삭제됨..";
	 }
	else {
		echo "데이터 삭제 실패!!!"."<BR>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);

	echo "<BR><BR> <a href='main.html'> <--초기 화면</A> ";
?>