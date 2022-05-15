<?php
 	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$applyId = $_POST["applyId"];
	
	$sql = "DELETE FROM apply WHERE applyId='".$applyId."' ";

	$ret = mysqli_query($con, $sql);

	echo "<h1>지원 정보 삭제 결과</h1>";
	if($ret) {
		echo $applyId." 지원정보가 성공적으로 삭제됨..";
	 }
	else {
		echo "데이터 삭제 실패!!!"."<BR>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);

	echo "<BR><BR> <a href='main.html'> <--초기 화면</A> ";
?>