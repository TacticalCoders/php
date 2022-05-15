<?php

	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");

	$clubId = $_POST['clubId'];	
	$clubName = $_POST["clubName"];
	$onelineIntro = $_POST["onelineIntro"];
	$intro = $_POST["intro"];
	$division = $_POST["division"];
	$category = $_POST["category"];
	$location = $_POST["location"];
	$contact = $_POST["contact"];
	$website = $_POST["website"];
	$recruitStart = $_POST["recruitStart"];
	$recruitEnd = $_POST["recruitEnd"];
	//$clubOwner = $_POST["clubOwner"];
	
	$sql = "UPDATE club SET clubName='".$clubName."', onelineIntro='".$onelineIntro."', intro ='".$intro."', division='".$division."', category='".$category."', location='".$location."', contact='".$contact."',  website='".$website."', recruitStart='".$recruitStart."', recruitEnd='".$recruitEnd."' WHERE clubId='".$clubId."' ";

	$ret = mysqli_query($con, $sql);

	echo "<h1>동아리 정보 수정 결과</h1>";
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
