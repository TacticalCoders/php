<?php
 	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
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
	$clubOwner = $_POST["clubOwner"];
	
	//$applytime = date('Y-m-s h:i:s', time());
	
	$sql = "INSERT INTO club (clubName,onelineIntro,intro,division,category,location,contact,website,recruitStart,recruitEnd,clubOwner) VALUES ('".$clubName."','".$onelineIntro."','".$intro."','".$division."','".$category."','".$location."','".$contact."','".$website."','".$recruitStart."','".$recruitEnd."','".$clubOwner."') ";

	$ret = mysqli_query($con, $sql);

 	echo "<h1>동아리 등록 결과</h1>";
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