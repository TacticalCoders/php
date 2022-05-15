<?php

	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$applyId = $_POST["applyId"];
	$aboutMe = $_POST["aboutMe"];
	$motive = $_POST["motive"];
	$applyTime = date('Y-m-s h:i:s', time());

	$sql = "UPDATE apply SET aboutMe='".$aboutMe."', motive='".$motive."', applyTime ='".$applyTime."' WHERE applyId='".$applyId."' ";
	
	$ret = mysqli_query($con, $sql);

	echo "<h1>지원 정보 수정 결과</h1>";
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