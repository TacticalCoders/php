<?php

$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");

$sql = "SELECT * FROM apply WHERE applyId='".$_GET['applyId']."'";

$ret = mysqli_query($con, $sql);

if($ret) {
	$count = mysqli_num_rows($ret);
	if($count==0) {
		echo $_GET['applyId']." 아이디의 지원번호가 없음!!!"."<BR>";
		echo "<br> <a href='main.html'> <--초기 화면</A> ";
		exit();
	}
}
else {
	echo "데이터 검색 실패!!!"."<BR>";
	echo "실패 원인 :".mysqli_error($con);
	echo "<br> <a href='main.html'> <--초기 화면</A> ";
	exit();
}

$row = mysqli_fetch_array($ret);
$applyId = $row["applyId"];
$applicantId = $row["applicantId"];
$clubId = $row["clubId"];
$aboutMe = $row["aboutMe"];
$motive = $row["motive"];

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    
	<h1>지원 정보 수정</h1>
	<form method="post" action="updateapply_result.php">
	    지원번호 : <input type="text" name="applyId" value=<?php echo $applyId ?>><br><br>
	    지원자 아이디 : <input type="text" name="applicantId"  value=<?php echo $applicantId ?>><br><br>
	    동아리 번호 : <input type="text" name="clubId" value=<?php echo $clubId ?>><br><br>
	    자기소개 : <br>
	    <textarea cols="50" rows="10" name="aboutMe" value=<?php echo $aboutMe ?>></textarea><br><br>
	    지원동기 : <br>
	    <textarea cols="50" rows="10" name="motive" value=<?php echo $motive ?>></textarea><br><br>
	   <input type="submit" value="지원 정보 수정하기">
	   </form><br><br>
	   <a href='applylist.php'><-- 지원 목록으로</a>

</body>
</html>